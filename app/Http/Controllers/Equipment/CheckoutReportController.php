<?php

namespace App\Http\Controllers\Equipment;

use App\Exports\CheckoutsExport;
use App\Exports\EquipmentExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CheckoutReportController extends Controller
{
    /**
     * Display report options.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startDate = Carbon::now('America/Denver')->subMonth(1)->firstOfMonth()->format('m/d/Y');
        $endDate = Carbon::now('America/Denver')->subMonth(1)->lastOfMonth()->format('m/d/Y');
        return view('equipment.admin.reports.index', compact('startDate', 'endDate'));
    }

    /**
     * Export data for given date range.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {

        return Excel::download(new CheckoutsExport($request), 'checkouts.xlsx');
    }


    /**
     * Export equipment list.
     *
     * @return \Illuminate\Http\Response
     */
    public function equipmentExport(Request $request)
    {

        return Excel::download(new EquipmentExport($request), 'equipment.xlsx');
    }

}
