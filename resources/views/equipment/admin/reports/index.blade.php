@extends('equipment.layouts.admin')

@section('title')
    Equipment Checkout Reports
@endsection

@section('content')
    <div class="clearfix">&nbsp;</div>
    <div class="col-12">
        {!! BootForm::open()->action(route('equipment.admin.report.export'))->post() !!}
            <div class="row">
                <div class="col">
                    {!! BootForm::text('Range', 'range') !!}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {!! BootForm::submit('Submit') !!}
                </div>
            </div>
        {!! BootForm::close() !!}
    </div>
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>
    <h2>Export Equipment</h2>
    <div class="col-12">
        {!! BootForm::open()->action(route('equipment.admin.report.equipment.export'))->post() !!}
        <div class="row">
            <div class="col">
                {!! BootForm::submit('Submit') !!}
            </div>
        </div>
        {!! BootForm::close() !!}
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('footer-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(function(){
            $('input[name="range"]').daterangepicker({
                startDate: '{{ $startDate }}',
                endDate: '{{ $endDate }}',
            });
        });
    </script>
@endpush