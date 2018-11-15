<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Patron;
use App\Models\Equipment;
use App\Models\Checkout;
use App\Models\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function show(Patron $patron)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function edit(Patron $patron)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patron $patron)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patron $patron)
    {
        //
    }

    /**
     * Authorizes the Patron to checkout Camera Equipment
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function authorize(Request $request, Patron $patron)
    {
        $checkout_reason = $request->get('checkout_reason');
        $checkout_period = $request->get('checkout_period');

        if (!$patron->canCheckout('camera') || 
            ($patron->canCheckout('camera') && $patron->checkout_period < $checkout_period)) {
            $patron->checkout_period = $checkout_period;
            $patron->checkout_reason = $checkout_reason;
            $patron->cameras_access_end_at = Date::first()->end_at;
        }

        return redirect()->to( route('equipment.admin.patron.show', $patron->id) );
    }

    /**
     * Show the form for autorizing the Patron to checkout cameras
     *
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function authorizeForm(Patron $patron)
    {
        //
    }

    /**
     * Display profile for current patron.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $patron = Patron::where('id', auth()->guard('patrons')->user()->id)->first();

        if (!$patron->areTermsAgreed()) {
            return redirect()->to( route('equipment.patron.terms') );
        }

        $patron->load('checkouts');

        $camera_ids = Equipment::where('group', 'camera')->select('id')->get();
        $other_ids = Equipment::where('group', 'other')->select('id')->get();

        $checkouts = Checkout::with(['patron', 'equipment'])
        ->orderBy('checked_out_at', 'desc')
        ->where('patron_id', $patron->id)
        ->where('checked_in_at', '=', null);

        $cameras = $checkouts->whereIn('equipment_id', $camera_ids)->get();
        $others = $checkouts->whereIn('equipment_id', $other_ids)->get();
        

        return view('equipment.patron.profile', compact('patron', 'cameras', 'others'));
    }

    /**
     * Display profile for current patron.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $patron = Patron::where('id', auth()->guard('patrons')->user()->id)->first();
        $date = Date::first()->end_at;

        return view('equipment.patron.terms', compact('patron', 'date'));
    }

    /**
     * Display profile for current patron.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTerms()
    {
        $patron = Patron::where('id', auth()->guard('patrons')->user()->id)->first();
        $patron->term_agreement_end_at = Date::first()->end_at;
        $patron->save();

        return redirect()->to( route('equipment.patron.profile') );
    }
}
