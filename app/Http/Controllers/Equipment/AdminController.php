<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;
use App\Models\Patron;
use App\Models\Checkout;
use App\Models\Equipment;

class AdminController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($patron)
    {
        $patron->load('checkouts');
        $message = '';
        $equipment = [];

        return view('equipment.admin.patron.show', compact('patron', 'message', 'equipment'));
    }

    /**
     * Update the home page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateShow(Request $request, $patron)
    {
        $message = '';
        $equipment = [];

        $newSearch = $request->get('search');

        $equipment = Equipment::where('barcode', 'like', '%' . $newSearch . '%')
        ->orWhere('item', 'like', '%' . $newSearch . '%')->get();

        if (sizeof($equipment) == 1) {
            return redirect()->to( route('equipment.admin.checkout.create', ['patron' => $patron->id, 'equipment' => $equipment[0]->id]) );
        }
        elseif (sizeof($equipment) == 0) {
            $message = 'No equipment found with search: ' . $newSearch;
        }
        return view('equipment.admin.patron.show', compact('patron', 'message', 'equipment'));
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
     * Display the home page of this resource
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $patrons = [];
        $message = '';

        return view('equipment.admin.index', compact('patrons', 'message'));
    }

    /**
     * Update the home page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateHome(Request $request)
    {
        $patrons = [];
        $message = '';

        $newSearch = $request->get('search');

        $patrons = Patron::where('first_name', 'like', '%' . $newSearch . '%')
        ->orWhere('last_name', 'like', '%' . $newSearch . '%')
        ->orWhere('inumber', 'like', '%' . $newSearch . '%')->get();

        if (sizeof($patrons) == 1) {
            return redirect()->to( route('equipment.admin.patron.show', $patrons[0]->id) );
        }
        elseif (sizeof($patrons) == 0) {
            $message = 'No patron found with search: ' . $newSearch;
        }

        return view('equipment.admin.index', compact('patrons', 'message'));
    }
}
