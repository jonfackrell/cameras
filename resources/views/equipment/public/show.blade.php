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
