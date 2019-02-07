<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentTypes = EquipmentType::withCount('equipment', 'available')->where('public_display', true);
        if(auth()->guard('patrons')->user()->canCheckout('camera')){
            $equipmentTypes = $equipmentTypes->whereIn('group', ['camera', 'other']);
        }else{
            $equipmentTypes = $equipmentTypes->whereIn('group', ['other']);
        }

        if(auth()->guard('patrons')->user()->getRole() == 'FAC'){
            // return all
        }else{
            $equipmentTypes = $equipmentTypes->where('faculty_only', '!=', 1);
        }

        $equipmentTypes = $equipmentTypes->get();

        return view('equipment.public.index', compact('equipmentTypes'));
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
    public function show($equipmentType)
    {
        $equipmentType->load('equipment');

        return view('equipment.public.show', compact('equipmentType'));
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
}
