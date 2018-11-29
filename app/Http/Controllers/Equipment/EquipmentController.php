<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
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
        return view('equipment.admin.equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipment = new Equipment;

        if (empty($request->get('item')))
            $equipment->item = null;
        else
            $equipment->item = $request->get('item');

        if (empty($request->get('barcode')))
            $equipment->barcode = null;
        else
            $equipment->barcode = $request->get('barcode');

        if (empty($request->get('group')))
            $equipment->group = null;
        else
            $equipment->group = $request->get('group');

        if (empty($request->get('type')))
            $equipment->type = null;
        else
            $equipment->type = $request->get('type');

        if (empty($request->get('description')))
            $equipment->description = null;
        else
            $equipment->description = $request->get('description');

        $equipment->save();

        return redirect()->to( route('equipment.admin') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
