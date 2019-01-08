<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Patron;
use App\Models\Checkout;
use App\Models\Equipment;
use App\Models\EquipmentType;

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
        $equipment = collect([]);

        if ($patron->canCheckout('other') === false){
            $message = 'Patron must agree to terms before checking out any equipment';
        }
        else if ($patron->canCheckout('camera') === false){
            $message = 'Patron doesn\'t have aproval to use camera equipment';
        }

        /*$cameras = $this->filterCheckoutsByGroup($patron, 'camera')->get();
        $others = $this->filterCheckoutsByGroup($patron, 'other')->get();*/

        $checkouts = Checkout::with(['patron', 'equipment'])
            ->orderBy('checked_out_at', 'desc')
            ->where('patron_id', $patron->id)
            ->whereNull('checked_in_at')
            ->get();


        return view('equipment.admin.patron.show', compact('patron', 'message', 'equipment', 'checkouts'));
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

        $newSearch = $request->get('search');

        $equipment_type_ids = EquipmentType::where('type', 'like', '%' . $newSearch . '%')
                              ->orWhere('display_name', 'like', '%' . $newSearch . '%')
                              ->select('id');

        $equipment = Equipment::where('checked_out_at', NULL)
                ->where(function ($query) use ($newSearch, $equipment_type_ids) { 
                    $query->where('barcode', 'like', '%' . $newSearch . '%')
                    ->orWhere('item', 'like', '%' . $newSearch . '%')
                    ->orWhere('description', 'like', '%' . $newSearch . '%')
                    ->orWhere(function ($query) use ($equipment_type_ids) {
                        $query->whereIn('equipment_type_id', $equipment_type_ids);
                    }); 
                });
        $allEquipment = Equipment::where('checked_out_at', NULL);

        $canDigital = $patron->canCheckout('camera');
        $canInHouse = $patron->canCheckout('other');

        if ($canInHouse && $canDigital) {
            if (empty($newSearch)) {
                $equipment = $allEquipment;
            }
        }
        else if (!$canDigital) {
            $message = 'Patron doesn\'t have aproval to use camera equipment';

            if (empty($newSearch)) {
                $equipment = $allEquipment->where('group', '!=', 'camera');
            }
            else {
                $equipment = $equipment->where('group', '!=', 'camera');
            }
        }

        $equipment = $equipment->get();
        
        

        if (sizeof($equipment) == 1) {
            return redirect()->to( route('equipment.admin.checkout.create', ['patron' => $patron->id, 'equipment' => $equipment[0]->id]) );
        }
        elseif (sizeof($equipment) == 0) {
            $message = 'No equipment found with search: ' . $newSearch;
        }

       /* $cameras = $this->filterCheckoutsByGroup($patron, 'camera')->get();
        $others = $this->filterCheckoutsByGroup($patron, 'other')->get();*/


        return view('equipment.admin.patron.show', compact('patron', 'message', 'equipment'));
    }

    /**
     * Filters checkouts based on the Patron, Equipment group, and if they are checked out
     *
     * @param  Patron  $patron
     * @param  str $group
     * @return Collection of Checkouts
     */
    private function filterCheckoutsByGroup($patron, $group)
    {
        $equipment_ids = Equipment::where('group', $group)->select('id')->get();

        $checkouts = Checkout::with(['patron', 'equipment'])
        ->orderBy('checked_out_at', 'desc')
        ->where('patron_id', $patron->id)
        ->where('checked_in_at', '=', null)
        ->whereIn('equipment_id', $equipment_ids);

        return $checkouts;
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
        $patrons = collect([]);
        $message = '';

        $cameraOut = Equipment::where('group', 'camera')
        ->where('checked_out_at', '!=', null)->get();
        $otherOut = Equipment::where('group', 'other')
        ->where('checked_out_at', '!=', null)->get();

        return view('equipment.admin.index', compact('patrons', 'message', 'cameraOut', 'otherOut'));
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

        $cameraOut = Equipment::where('group', 'camera')
        ->where('checked_out_at', '!=', null)->get();
        $otherOut = Equipment::where('group', 'other')
        ->where('checked_out_at', '!=', null)->get();

        return view('equipment.admin.index', compact('patrons', 'message', 'cameraOut', 'otherOut'));
    }
}
