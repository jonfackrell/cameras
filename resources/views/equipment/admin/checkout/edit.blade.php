@extends('equipment.layouts.admin')

@section('title')
    Edit Checkout
@endsection

@section('content')
	<div class="col-lg-8 mt-2 mb-2">
		
		{!! BootForm::open()->post()->action(route('equipment.admin.checkout.edit', ['checkout' => $checkout->id])) !!}
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label class="control-label" for="due_at">Due</label>
					<div class="input-group date" id="datetimepicker1" data-target-input="nearest">

						<input type="text" name="due_at" class="form-control datetimepicker-input" data-target="#datetimepicker1" value="{{ $checkout->due_at->tz('America/Denver')->format("m/d/Y g:i A") }}"/>
						<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
				</div>
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endpush

@push('footer-scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.23.0/moment.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
	<script>
		$(function(){
			$('#datetimepicker1').datetimepicker({
				sideBySide: true,
				debug: true
			});
		});
	</script>
@endpush