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
        <div class="col-md-3">
            <image class="thumbnail" src="{{ $equipmentType->getMedia('equipment-type')[0]->getUrl() }}" alt=""/>
        </div>
        <div class="col-md-9">
            <h2>{{ $equipmentType->display_name }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if($equipmentType->equipment->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Item #</th>
                        <th scope="col">Description</th>
                        <th scope="col">Due</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($equipmentType->equipment as $equipment)
                        <tr>
                            <td>
                                {{ $equipment->item }}
                            </td>
                            <td>
                                {{ $equipment->description }}
                            </td>
                            <td>
                                {{ ((!is_null($equipment->due_at))?$equipment->due_at->toDayDateTimeString():'Checked In') }}
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

    {!! $equipmentType->description !!}
    

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
