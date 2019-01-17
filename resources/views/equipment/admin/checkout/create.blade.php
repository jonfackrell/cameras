@extends('equipment.layouts.admin')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<h5 class="col">{{ $equipment->getDisplayName() }}</h5>
		</div>
		<div class="row"> 
			<div class="col-8"> 
				{!! BootForm::open()
								->post()
								->action( route('equipment.admin.checkout.create', [
												'patron' => $patron->id,
												'equipment' => $equipment->id
											])
										)
								->enctype("multipart/form-data")
				!!}


				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label class="control-label" for="due_at">Due</label>
							<div class="input-group date" id="datetimepicker1" data-target-input="nearest">

								<input type="text" name="due_at" class="form-control datetimepicker-input" data-target="#datetimepicker1" value="{{ $due_at->tz('America/Denver')->format("m/d/Y g:i A") }}"/>
								<div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				@if($equipment->type == 'tripod')
					@include('equipment.layouts.parts.tripod-checkout-form')
				@elseif($equipment->equipment_type->type == 'video-cam' || $equipment->equipment_type->type == 'digital-cam' || $equipment->equipment_type->type == 'dslr-cam')
					@include('equipment.layouts.parts.camera-checkout-form')
				@elseif($equipment->equipment_type->type == 'tablet-pen')
					@include('equipment.layouts.parts.tablet-pen-checkout-form')
				@endif

				{!! BootForm::textarea("&nbsp;", 'note')->rows(3) !!}

				<div class="row" style="margin: 10px -15px 15px;">
					<div class="col">
						<input type="file" name="file[]" id="file" accept="image/*"/>
					</div>
				</div>

				<div class="row" style="margin: 10px -15px 15px;">
					<div class="col">
						<input type="file" name="file[]" id="file" accept="image/*"/>
					</div>
				</div>

				<div class="row" style="margin: 10px -15px 15px;">
					<div class="col">
						<input type="file" name="file[]" id="file" accept="image/*"/>
					</div>
				</div>

				{!! BootForm::submit('Check Out') !!}
				{!! BootForm::close() !!}
			</div>
		</div>
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
			var $datepicker = $('#datetimepicker1').datetimepicker({
				sideBySide: true,
				debug: false
			});

			$(document).on('click', 'button[type="submit"]', function(){
				$(this).prop('disabled', true);
				$(this).closest('form').submit();
			});


		});
	</script>
@endpush

