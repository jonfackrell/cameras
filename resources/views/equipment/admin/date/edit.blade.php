@extends('equipment.layouts.admin')

@section('title')
    Dates
@endsection

@section('content')
	<div class="col-lg-8 list-group mt-2 mb-2">
		
		{!! BootForm::open()->post()->action(route('equipment.admin.date.edit', ['date' => $date->id])) !!}
		<div class="row"> 
			
			<div class="col-4"> 
				{!! BootForm::text('Description', 'description')->placeholder($date->description) !!}
			</div>
			<div class="col-4"> 
				{!! BootForm::text('Range', 'range') !!}
			</div>
			<div class="col-4"> 
				{!! BootForm::text('End At', 'end_at') !!}
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				{!! BootForm::submit('Save') !!}
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
                startDate: '{{ $date->end_at->format("m/d/Y") }}',
                endDate: '{{ $date->end_at->format("m/d/Y") }}',
            });
        });
    </script>
@endpush