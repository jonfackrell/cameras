<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Checkout;
use App\Models\Equipment;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkouts = Checkout::with(['patron', 'equipment'])->orderBy('checked_out_at', 'desc')->get();

        return view('equipment.admin.history', compact('checkouts'));
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

        return view('equipment.admin.checkout.create', compact('patron', 'equipment', 'tripods', 'memory'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        // prevent checkin
        //$equipment = Equipment::where('id', $checkouts[0]->equipment_id);
        //$equipment->is_checked_in = TRUE;
        //$equipment->save();
        
        $checkouts->update(['checked_in_at' => Carbon::now(), 'checked_in_by' => auth()->guard('web')->user()->id, 'checkin_note' => $request->get('note')]);

        Equipment::whereIn('id', $checkouts->pluck('equipment_id'))->update(['checked_out_at' => NULL]);
        /** WHY DOES THIS NOT WORK? **/
        // foreach ($checkouts as $checkout) {
        //     $equipment = Equipment::where('id', $checkout->equipment_id);
        //     $equipment->is_checked_in = TRUE;
        //     $equipment->save();
        // }



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
        $checkout = new Checkout;
        $checkout->equipment_id = $equipment->id;
        $checkout->patron_id = $patron->id;
        $checkout->checked_out_at = Carbon::now();

        if ($equipment->group == 'in-house') { 
            $checkout->due_at = Carbon::tomorrow('America/Denver')->subMinutes(30)->tz('UTC');
        }
        else {
            $checkout->due_at = Carbon::now()->addDays(1);
        }

        $checkout->checked_out_by = auth()->guard('web')->user()->id;
        $checkout->checkout_note = $note;
        $checkout->save();

        $equipment->checked_out_at = Carbon::now();
        $equipment->save();

    }
}
