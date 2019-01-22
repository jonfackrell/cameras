<?php

namespace App\Exports;

use App\Models\Checkout;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CheckoutsExport implements FromCollection, WithMapping, WithHeadings
{

    public $request;

    /**
     * Create a new export instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $start = Carbon::createFromFormat('m/d/Y', trim(explode('-', $this->request->get('range'))[0]))->startOfDay();
        $end = Carbon::createFromFormat('m/d/Y', trim(explode('-', $this->request->get('range'))[1]))->endOfDay();
        
        return Checkout::with('patron', 'equipment', 'equipment.equipment_type')
                    ->whereBetween('created_at', [
                        $start,
                        $end
                    ])
                    ->get();
    }


    /**
     * @var Checkout $checkout
     */
    public function map($checkout): array
    {
        return [
            $checkout->created_at->tz('America/Denver')->format('m/d/Y'),
            $checkout->patron->getFullNameAttribute(),
            $checkout->patron->inumber,
            $checkout->checked_out_at->tz('America/Denver')->format('h:m:s A'),
            (!is_null($checkout->checked_in_at))?$checkout->checked_in_at->tz('America/Denver')->format('h:m:s A'):'',
            $checkout->equipment->item,
            $checkout->equipment->equipment_type->display_name,
            $checkout->checkout_note,
            $checkout->checkin_note,
        ];
    }

    public function headings(): array
    {
        return [
            'Date',
            'Name',
            'I-Number',
            'Checkout Time',
            'Checkin time',
            'Item',
            'Type',
            'Checkout Note',
            'Checkin Note',
        ];
    }
}
