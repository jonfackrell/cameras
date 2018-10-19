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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Check in equipment for a Patron
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request, $patron)
    {
        
        Checkout::whereIn('id', $request->get('equipment', []))->update(['checked_in_at' => Carbon::now(), 'checked_in_by' => auth()->guard('web')->user()->id]);

        return redirect()->to( route('equipment.admin.patron.show', $patron->id) );
    }

    /**
     * Check out equipment for a Patron
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request, $patron)
    {
        $query = $request->get('search');
        $equipment = Equipment::where('item', $query)->get()->first();

        $checked_out = Checkout::where('checked_in_at', NULL)->where('equipment_id', $equipment->id)->get();

        if (count($checked_out) <= 0) {
            $checkout = new Checkout;
            $checkout->equipment_id = $equipment->id;
            $checkout->patron_id = $patron->id;
            $checkout->checked_out_at = Carbon::now();
            $checkout->due_at = Carbon::now()->addDays(1);
            $checkout->checked_out_by = auth()->guard('web')->user()->id;
            $checkout->save();

            return redirect()->to( route('equipment.admin.patron.show', $patron->id) );
        }
        else {
            $patron->load('checkouts');
            $message = 'Warning: The item '. $equipment->item . ' is already checked out. Please check it back in before checking it out again';

            return view('equipment.admin.patron.show', compact('patron', 'message'));
        }
        
        
    }
}
