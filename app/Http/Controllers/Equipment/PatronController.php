<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Patron;
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

        return view('equipment.patron.profile', compact('patron'));
    }

    /**
     * Display profile for current patron.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $patron = Patron::where('id', auth()->guard('patrons')->user()->id)->first();

        return view('equipment.patron.terms', compact('patron'));
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
