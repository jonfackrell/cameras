@extends('equipment.layouts.admin')

@section('title')
    Dates
@endsection

@section('content')
	<div class="col-lg-8 mt-2 mb-2">
		
		{!! BootForm::open()->post()->action(route('equipment.admin.date.edit', ['date' => $date->id])) !!}
		<div class="row"> 
			
			<div class="col-4"> 
				{!! BootForm::text('Description', 'description')->value($date->description) !!}
			</div>
			<div class="col-4"> 
				{!! BootForm::text('End At', 'end_at')->value($date->end_at->format("m/d/Y")) !!}
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@push('footer-scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function(){
            $('input[name="end_at"]').datepicker({
                changeMonth: true
            });            
        });
    </script>
@endpush