<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Patron;
use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\Checkout;
use App\Models\Date;
use App\Notifications\LinkToTermsConditions;
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
        $pageSize = 25;

        $checkouts = Checkout::with(['patron', 'equipment'])->orderBy('checked_out_at', 'desc')->where('patron_id', $patron->id)->paginate($pageSize);

        $cameras = $checkouts->filter(function ($value, $key) {
            return $value->equipment->group == 'camera';
        });

        $others = $checkouts->filter(function ($value, $key) {
            return $value->equipment->group == 'other';
        });

        return view('equipment.admin.patron.history', compact('checkouts', 'patron', 'cameras', 'others', 'pageSize'));
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
    public function authorizeCameras(Request $request, Patron $patron)
    {
        $checkout_reason = $request->get('checkout_reason');
        $checkout_period = $request->get('checkout_period');

        if (!$patron->canCheckout('camera') || 
            ($patron->canCheckout('camera') && $patron->checkout_period < $checkout_period)) {
            $patron->checkout_period = $checkout_period;
            $patron->checkout_reason = $checkout_reason;
            $patron->cameras_access_end_at = Date::first()->end_at;
            $patron->save();
        }

        if($request->has('send_terms_email')){
            $patron->notify(new LinkToTermsConditions());
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
        return view('equipment.admin.patron.authorize', compact('patron'));
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

        $pageSize = 25;

        $checkouts = Checkout::with(['patron', 'equipment'])
                     ->orderBy('checked_out_at', 'desc')
                     ->where('patron_id', $patron->id)
                     ->where('checked_in_at', '=', null)
                     ->paginate($pageSize);

        $cameras = $checkouts->filter(function ($value, $key) {
            return $value->equipment->group == 'camera';
        });

        $others = $checkouts->filter(function ($value, $key) {
            return $value->equipment->group == 'other';
        });

        $types = EquipmentType::where('display_name', '!=', NULL);

        if ($patron->getRole() != 'FAC') {
            $types = $types->where('faculty_only', false);
        }

        if (!$patron->canCheckout('camera')) {
            $types = $types->where('group', '!=', 'camera');
        }

        $types = $types->get()->sortBy('group');

        return view('equipment.patron.profile', compact('checkouts', 'patron', 'cameras', 'others', 'pageSize', 'types'));
    }


    /**
     * Allows the Patron to Self Authorize checking out Camera Equipment
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patron  $patron
     * @return \Illuminate\Http\Response
     */
    public function selfAuthorizeCameras(Request $request)
    {
        
        $patron = Patron::where('id', auth()->guard('patrons')->user()->id)->first();
        $patron->checkout_reason = $request->get('checkout_reason');
        $patron->cameras_access_end_at = Date::first()->end_at;
        $patron->save();
        

        return redirect()->to( route('equipment.patron.profile') );
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
