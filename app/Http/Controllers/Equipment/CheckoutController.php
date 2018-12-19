<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

use App\Notifications\LateFeeNotification;
use App\Models\Patron;
use App\Models\Checkout;
use App\Models\Equipment;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = 'all')
    {
        $checkouts = Checkout::with(['patron', 'equipment'])->orderBy('checked_out_at', 'desc');

        $checkouts = $this->filterCheckoutsByType($checkouts, $type);

        $checkouts = $checkouts->paginate(25);

        return view('equipment.admin.history', compact('checkouts', 'type'));
    }

    /**
     * Update the home page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateIndex(Request $request, $type = 'all')
    {
        // TODO: FIX THE SEARCH FUNCTION
        $newSearch = $request->get('search');

        $patron_ids = Patron::where('first_name', 'like', '%' . $newSearch . '%')
        ->orWhere('last_name', 'like', '%' . $newSearch . '%')
        ->orWhere('inumber', 'like', '%' . $newSearch . '%')
        ->select('id')->get();
        
        $checkouts = [];

        $checkouts = Checkout::with(['patron', 'equipment'])
        ->orderBy('checked_out_at', 'desc')
        ->whereIn('patron_id', $patron_ids);

        $checkouts = $this->filterCheckoutsByType($checkouts, $type);

        $checkouts = $checkouts->paginate(25);

        return view('equipment.admin.history', compact('checkouts', 'type'));
    }

    /**
     * Filters checkouts based on the Collection of Checkouts and type
     *
     * @param  Collection of Checkouts  $checkouts
     * @param  str $type
     * @return Collection of Checkouts
     */
    private function filterCheckoutsByType($checkouts, $type)
    {
        $type = strtolower($type);

        if (stripos($type, 'in') !== false) { 
            $checkouts = $checkouts->where('checked_in_at', '!=', null);
        }
        else if (stripos($type, 'out') !== false) {
            $checkouts = $checkouts->where('checked_in_at', '=', null);
        }

        if (stripos($type, 'camera') !== false) {
            $equipment_ids = Equipment::where('group', 'camera')->select('id')->get();
            $checkouts = $checkouts->whereIn('equipment_id', $equipment_ids);
        }
        else if (stripos($type, 'other') !== false) {
            $equipment_ids = Equipment::where('group', 'other')->select('id')->get();
            $checkouts = $checkouts->whereIn('equipment_id', $equipment_ids);
        }
        

        return $checkouts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function create($patron, $equipment)
    {
        $tripods = Equipment::where('type', 'tripod')->where('checked_out_at', NULL)->get();
        $memory = [];

        if (sizeof(Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%2GB%')->get()))
            $memory['2GB'] = '2GB';
        if (sizeof(Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%4GB%')->get()))
            $memory['4GB'] = '4GB';
        if (sizeof(Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%8GB%')->get()))
            $memory['8GB'] = '8GB';
        if (sizeof(Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%16GB%')->get()))
            $memory['16GB'] = '16GB';
        if (sizeof(Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%32GB%')->get()))
            $memory['32GB'] = '32GB';
        if (sizeof(Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%64GB%')->get()))
            $memory['64GB'] = '64GB';

        $batteries = Equipment::where('type', str_replace('cam','bat', $equipment->type))->where('checked_out_at', NULL)->get();

        $powerSupplies = Equipment::where('type', str_replace('cam','pow', $equipment->type))->where('checked_out_at', NULL)->get();

        if (!is_null($equipment->checked_out_at)){
            return redirect()->to( route('equipment.admin.patron.show', $patron->id) );
        }
        else {
            return view('equipment.admin.checkout.create', compact('patron', 'equipment', 'tripods', 'memory', 'batteries', 'powerSupplies'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $patron, $equipment)
    {
        $note = $request->get('note');

        $this->checkout($patron, $equipment, $note);

        if ($request->get('power')){
            $power = Equipment::where('type', 'power')->where('checked_out_at', NULL)->first();
            $this->checkout($patron, $power, $note);
        }

        if ($request->get('memory')){
            $memory = Equipment::where('type', 'memory')->where('checked_out_at', NULL)->where('description', 'like', '%' . $request->get('size') . '%')->first();
            $this->checkout($patron, $memory, $note);
        }

        if ($request->get('usb')){
            $usb = Equipment::where('type', 'usb')->where('checked_out_at', NULL)->first();
            $this->checkout($patron, $usb, $note);
        }

        if ($request->get('tripods')){
            $tripod = Equipment::where('id', $request->get('tripod'))->first();
            $this->checkout($patron, $tripod, $note);
        }
        
        if ($request->get('head')){
            $head = Equipment::where('type', 'tripod-head')->where('checked_out_at', NULL)->first();
            $this->checkout($patron, $head, $note);
        }

        if ($request->get('hand')){
            $hand = Equipment::where('type', 'tripod-hand')->where('checked_out_at', NULL)->first();
            $this->checkout($patron, $hand, $note);
        }
        
        if ($equipment->type == 'video-cam') {
            if ($request->get('battery')){
                $battery = Equipment::where('type', 'video-bat')->where('checked_out_at', NULL)->first();
                $this->checkout($patron, $battery, $note);
            }

            if ($request->get('battery-ex')){
                $batteryEx = Equipment::where('type', 'video-bat')->where('checked_out_at', NULL)->first();
                $this->checkout($patron, $batteryEx, $note);
            }
        }
        else if ($equipment->type == 'digital-cam') {
            if ($request->get('battery')){
                $battery = Equipment::where('type', 'digital-bat')->where('checked_out_at', NULL)->first();
                $this->checkout($patron, $battery, $note);
            }

            if ($request->get('battery-ex')){
                $batteryEx = Equipment::where('type', 'digital-bat')->where('checked_out_at', NULL)->first();
                $this->checkout($patron, $batteryEx, $note);
            }
        }
        else if ($equipment->type == 'dslr-cam') {
            if ($request->get('battery')){
                $battery = Equipment::where('type', 'dslr-bat')->where('checked_out_at', NULL)->first();
                $this->checkout($patron, $battery, $note);
            }

            if ($request->get('battery-ex')){
                $batteryEx = Equipment::where('type', 'dslr-bat')->where('checked_out_at', NULL)->first();
                $this->checkout($patron, $batteryEx, $note);
            }
        }

        return redirect()->to( route('equipment.admin.patron.show', $patron->id) );
    }

    /**
     * Display the specified resource.
     *
     * @param  Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show($checkout)
    {
        return view('equipment.admin.checkout.show', compact('checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit($checkout)
    {
        return view('equipment.admin.checkout.edit', compact('checkout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Check out equipment for a Patron
     *
     * @param  Equipment  $equipment
     * @param  Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function validateCheckout($query, $equipment, $patron)
    {
        $patron->load('checkouts');

        if (empty($query)) {
            $message = 'The item must not be empty';

            return view('equipment.admin.patron.show', compact('patron', 'message'));
        }

        if (empty($equipment)) {
            $message = 'Warning: The item \''. $query . '\' is not in the system. Please add the item to the system or try checking out a different one';

            return view('equipment.admin.patron.show', compact('patron', 'message'));
        } 
        
        $checked_out = Checkout::where('checked_in_at', NULL)->where('equipment_id', $equipment->id)->get();

        if (count($checked_out) > 0) { 
            $message = 'Warning: The item '. $equipment->item . ' is already checked out. Please check it back in before checking it out again';

            return view('equipment.admin.patron.show', compact('patron', 'message'));
        }

        

        return false;
    }

    /**
     * Check in equipment for a Patron
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request, $patron)
    {
        $checkouts = Checkout::whereIn('id', $request->get('equipment', []));
        
        $checkouts->update(['checked_in_at' => Carbon::now(), 'checked_in_by' => auth()->guard('web')->user()->id, 'checkin_note' => $request->get('note')]);

        Equipment::whereIn('id', $checkouts->pluck('equipment_id'))->update(['checked_out_at' => NULL]);
        
        return redirect()->to( route('equipment.admin.patron.show', $patron->id) );
    }

    /**
     * Check out equipment for a Patron
     *
     * @param  Equipment $equipment
     * @param  Patron  $patron
     */
    public function checkout($patron, $equipment, $note)
    {
        if (!empty($equipment)) {
            $checkout = new Checkout;
            $checkout->equipment_id = $equipment->id;
            $checkout->patron_id = $patron->id;
            $checkout->checked_out_at = Carbon::now();
    
            if ($equipment->group == 'camera') { 
                $checkout->due_at = Carbon::now()->addDays($patron->checkout_period);
            }
            else {
                $checkout->due_at = Carbon::tomorrow('America/Denver')->subMinutes(30)->tz('UTC');
            }
    
            $checkout->checked_out_by = auth()->guard('web')->user()->id;
            $checkout->checkout_note = $note;
            $checkout->save();
    
            $equipment->checked_out_at = Carbon::now();
            $equipment->save();
        }

    }

    /**
     * Show Checkouts that need approval
     *
     * @return \Illuminate\Http\Response
     */
    public function approvalForm()
    {
        $checkouts = Checkout::late()->where('approved_at', NULL)->get();

        $checkouts = $checkouts->filter(function ($value, $key) {
            return $value->isLate();
        });

        $cameras = $checkouts->filter(function ($value, $key) {
            return $value->equipment->group == 'camera';
        });

        $others = $checkouts->filter(function ($value, $key) {
            return $value->equipment->group == 'other';
        });

        $feeAmount = 10;

        return view('equipment.admin.checkout.approval', compact('checkouts', 'cameras', 'others', 'feeAmount'));
    }

    /**
     * Updated approved_at of each Checkout in Request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approval(Request $request)
    {
        $feeAmounts = $request->get('feeAmounts', []);
        //$checkouts = Checkout::whereIn('id', $request->get('checkouts', []));
        $checkouts = $request->get('checkouts', []);

        for ($i = 0; $i < sizeof($feeAmounts); $i++) {
            $feeAmount = intval($feeAmounts[$i]) * 100;
            $checkout = Checkout::where('id', $checkouts[$i])->first();

            $checkout->approved_at = Carbon::now();
            

            if ($feeAmount > 0) {
                $checkout->fee_amount = $feeAmount;

                $patron = Patron::where('id', $checkout->patron_id)->first();
                $patron->notify(new LateFeeNotification($checkout, $feeAmount));
            }
            else {
                $checkout->fee_amount = NULL;
            }

            $checkout->save();
        }
        
        //$checkouts->update(['approved_at' => Carbon::now()]);

        return redirect()->to( route('equipment.admin.checkout.approval') );
    }
}
