<?php

namespace App\Http\Controllers\Equipment;

use App\Models\Equipment;
use App\Models\EquipmentType;
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
        $pageSize = 25;

        $equipment = Equipment::whereNotNull('equipment_type_id')
                                    ->orderBy('item')
                                    ->paginate($pageSize);
        

        return view('equipment.admin.equipment.index', compact('equipment', 'pageSize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: This can be cleaned up
        $equipmentTypes = EquipmentType::all();

        $equipmentTypesDuplicable = $equipmentTypes->where('duplicable', true);

        $equipmentTypes = $equipmentTypes->groupBy('group');        

        $equipmentTypesDuplicable = $equipmentTypesDuplicable->groupBy('group');
        
        return view('equipment.admin.equipment.create', compact('equipmentTypes', 'equipmentTypesDuplicable'));
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

        $equipment->item = $request->get('item');
        $equipment->barcode = $request->get('barcode');
        $equipment->group = $request->get('group');
        $equipment->equipment_type_id = $request->get('type');
        $equipment->description = $request->get('description');

        $equipment->save();

        return redirect()->to( route('equipment.admin.equipment.index') );
    }

    /**
     * Store multiple newly created resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiply(Request $request)
    {
        $group = $request->get('group_multi');
        $type_id = $request->get('type_multi');
        $description = $request->get('description_multi');

        for ($i=0; $i < $request->get('multiplier'); $i++) { 
            $equipment = new Equipment;

            $equipment->group = $group;
            $equipment->equipment_type_id = $type_id;
            $equipment->description = $description;

            $equipment->save();
        }

        return redirect()->to( route('equipment.admin.equipment.index') );
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
