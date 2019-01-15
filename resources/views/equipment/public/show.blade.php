@extends('layouts.public')

@section('title')
    {{ $equipmentType->display_name }}
@endsection

@section('breadcrumbs')
    <a href="{{ route('maclab.home') }}">MAC LAB</a>
    /
    <a href="{{ route('equipment.home') }}">EQUIPMENT</a>
    /
    <span> {{ strtoupper($equipmentType->display_name) }}</span>
@endsection


@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="media">
                <img src="{{ $equipmentType->getMedia('equipment-type')[0]->getUrl() }}" alt="" style="height: 150px; width: auto;" class="mr-3">
                <div class="media-body">
                    <h2 class="mt-0">{{ $equipmentType->display_name }}</h2>
                     <div class="row">
                         <div class="col-md-6">
                             <div>
                                 <span style="font-weight: bold;">Checkout Period:</span>
                                 @if($equipmentType->loan_type == 'CAMERA')
                                    {{ ((!is_null(auth()->guard('patrons')->user()->checkout_period))?'24 Hours':auth()->guard('patrons')->user()->checkout_period) }}
                                 @elseif($equipmentType->loan_type == 'CUSTOM')
                                    {{ $equipmentType->loan_period }} Hours
                                 @elseif($equipmentType->loan_type == 'DAILY')
                                    Due same day before closing
                                 @endif
                             </div>
                             <div>
                                 <span style="font-weight: bold;">Late Fee: ${{ ($equipmentType->fine_amount)/100 }} / day</span>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix">&nbsp;</div>

    <div class="row">
        <div class="col-md-12">
            @if($equipmentType->equipment->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Item #</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($equipmentType->equipment->sortBy('item') as $equipment)
                        <tr>
                            <td>
                                {{ $equipment->item }}
                            </td>
                            <td>
                                {{ $equipment->description }}
                            </td>
                            <td>
                                {{ ((!is_null($equipment->checked_out_at))?('Checked out on '. $equipment->checked_out_at->tz('America/Denver')->format('m-d-Y')):'Checked In') }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5">

                        </td>
                    </tr>
                    </tfoot>
                </table>
        </div>
        @endif
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
                DESCRIPTION
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            {!! $equipmentType->description !!}
        </div>
    </div>


    

@endsection


@push('styles')
    <style>

    </style>
@endpush

@push('header-scripts')
    <script>
        $(function() {

        });
    </script>
@endpush
