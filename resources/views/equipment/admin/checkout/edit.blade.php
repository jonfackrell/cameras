@extends('equipment.layouts.admin')

@section('title')
    Edit Checkout
@endsection

@section('content')
	<div class="col-lg-8 mt-2 mb-2">
		
		{!! BootForm::open()->post()->action(route('equipment.admin.checkout.edit', ['checkout' => $checkout->id])) !!}
		<div class="row"> 
			<div class="col-4"> 
				{!! BootForm::text('Due At', 'due_at')->value($checkout->due_at->format("m/d/Y")) !!}
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
            $('input[name="due_at"]').datepicker({ });            
        });
    </script>
@endpush