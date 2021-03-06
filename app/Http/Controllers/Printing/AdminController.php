<?php

namespace App\Http\Controllers\Printing;

use App\Events\FilamentUsed;
use App\Models\Department;
use App\Models\EmailSetting;
use App\Models\Messages;
use App\Models\PrintJob;
use App\Models\Status;
use App\Notifications\GenericNotification;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    /**
     * Display the Admin Dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = Status::whereDepartment(auth()->guard('web')->user()->department)
                                ->orderBy('order_column', 'ASC')
                                ->get();

        $dashboardStatuses = $statuses->where('dashboard_display', 1)->all();
        $printJobs = [];
        foreach($dashboardStatuses as $status){
            $printJobs[$status->id] = PrintJob::with('currentStatus', 'owner', 'getFilament')
                                                ->where('status', $status->id)
                                                ->orderBy('purpose', 'ASC')
                                                ->orderBy('created_at', 'ASC');
            if($request->has('q')){
                $printJobs[$status->id] = $printJobs[$status->id]
                                            ->whereHas('owner', function($query) use ($request){
                                                $query->where('first_name', 'LIKE', '%'.$request->get('q').'%')
                                                        ->orWhere('last_name', 'LIKE', '%'.$request->get('q').'%')
                                                        ->orWhere('inumber', $request->get('q'));
                                            });
            }
            $printJobs[$status->id] = $printJobs[$status->id]->paginate(20, ['*'], str_slug($status->name));
        }

        return view('3d.admin.index', compact('printJobs', 'dashboardStatuses', 'statuses'));
    }

    /**
     * Edit the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $printJob = PrintJob::with('messages')->findOrFail($id);
        $newStatus = $request->get('status');
        $status = Status::findOrFail($newStatus);
        if($status->systemNotification){
            return view('3d.admin.edit', compact('printJob', 'status', 'newStatus'));
        }else{
            $originalStatus = $printJob->status;
            $printJob->status = $newStatus;
            $printJob->save();
            if($status->subtract_inventory){
                event(new FilamentUsed($printJob));
            }
            return redirect()->route('3d.admin', ["#$originalStatus"]);
        }

    }

    public function update(Request $request, $id)
    {
        $newStatus = $request->get('new_status');
        $status = Status::findOrFail($newStatus);
        $printJob = PrintJob::findOrFail($id);
        $originalStatus = $printJob->status;
        $printJob->status = $newStatus;
        $printJob->save();

        if(($request->get('action') == 'send') && $printJob->currentStatus->systemNotification){
            $printJob->owner->notify(new GenericNotification($printJob, $request->get('subject'), $request->get('message')));
            $message = Messages::create([
                'user' => auth()->guard('web')->user()->id,
                'printjob' => $id,
                'subject' => $request->get('subject'),
                'message' => $request->get('message'),
                'source' => 'EMPLOYEE',
            ]);
        }

        if($status->subtract_inventory){
            event(new FilamentUsed($printJob));
        }

        return redirect()->route('3d.admin', ["#$originalStatus"]);
        
    }

    /**
     * Create email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createEmail(Request $request, $id)
    {
        $printJob = PrintJob::findOrFail($id);

        return view('3d.admin.create-email', compact('printJob'));

    }

    /**
     * Send email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request, $id)
    {

        $printJob = PrintJob::findOrFail($id);

        $printJob->owner->notify(new GenericNotification($printJob, $request->get('subject'), $request->get('message')));

        $message = Messages::create([
            'user' => auth()->guard('web')->user()->id,
            'printjob' => $id,
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
            'source' => 'EMPLOYEE',
        ]);

        return redirect()->route('3d.admin', ["#$printJob->status"]);

    }

    /**
     * Reprint.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reprint(Request $request, $id)
    {

        $oldPrintJob = PrintJob::findOrFail($id);
        $printJob = $oldPrintJob->replicate();

        $department = Department::findOrFail($printJob->selectedPrinter->departmentOwner->id);

        $printJob->status = $department->initial_status;

        $printJob->push();

        //load relations on EXISTING MODEL
        $oldPrintJob->relations = [];
        $oldPrintJob->load('files');
        $relations = $oldPrintJob->getRelations();
        //re-sync everything
        foreach ($relations as $relation) {
            foreach ($relation as $relationRecord) {
                $newRelationship = $relationRecord->replicate();
                $newRelationship->print_job_id = $printJob->id;
                $newRelationship->push();
            }
        }

        return redirect()->route('3d.uploadfile.edit', ['printjob' => $printJob])->with(['success' => 'Print job copied successfully!']);

    }
}
