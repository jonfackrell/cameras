<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;

use App\Models\EquipmentType;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentTypes = EquipmentType::all();

        return view('equipment.admin.equipment-type.index', compact('equipmentTypes'));
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
        $equipmentType = new EquipmentType;

        $equipmentType->type = $request->get('type');
        $equipmentType->group = $request->get('group');
        $equipmentType->display_name = $request->get('display_name');
        $equipmentType->loan_type = $request->get('loan_type', 'DAILY');
        $equipmentType->fine_amount = $request->get('fine_amount', 10);

        $equipmentType->save();

        return redirect()->to( route('equipment.admin.equipment-type.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function show($equipmentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function edit($equipmentType)
    {
        return view('equipment.admin.equipment-type.edit', compact('equipmentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $equipmentType)
    {
        $equipmentType->type = $request->get('type');
        $equipmentType->group = $request->get('group');
        $equipmentType->display_name = $request->get('display_name');
        $equipmentType->duplicable = $request->get('duplicable', false);
        $equipmentType->faculty_only = $request->get('faculty_only', false);
        $equipmentType->description = $request->get('description');
        $equipmentType->loan_type = $request->get('loan_type', 'DAILY');
        $equipmentType->loan_period = $request->get('loan_period', 0);
        $equipmentType->fine_amount = $request->get('fine_amount', 10);

        $equipmentType->save();

        if($request->has('file')){
            $equipmentType->addAllMediaFromRequest()->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('equipment-type');
            });
        }

        return redirect()->to( route('equipment.admin.equipment-type.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy($equipmentType)
    {
        //
    }
}
