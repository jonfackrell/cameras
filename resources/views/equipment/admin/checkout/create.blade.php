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
				@if($equipment->type == 'tripod')
					@include('equipment.layouts.parts.tripod-checkout-form')
				@elseif($equipment->type == 'video-cam' || $equipment->type == 'digital-cam' || $equipment->type == 'dslr-cam')
					@include('equipment.layouts.parts.camera-checkout-form')
				@endif
				{!! BootForm::textarea("&nbsp;", 'note')->rows(3) !!}

				<div class="row" style="margin: 10px -15px 15px;">
					<div class="col">
						<input type="file" name="file" id="file" accept="image/*"/>
					</div>
				</div>

				{!! BootForm::submit('Check Out') !!}
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection

@push('styles')

@endpush

@push('footer-scripts')

@endpush