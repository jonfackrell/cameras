@extends('equipment.layouts.admin')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<h5 class="col">{{ $equipment->item }}</h5>
		</div>
		<div class="row"> 
			<div class="col-8"> 
				{!! BootForm::open()->post()->action(route('equipment.admin.checkout.create', ['patron' => $patron->id, 'equipment' => $equipment->id])) !!}
				@if($equipment->type == 'tripod')
					@include('equipment.layouts.parts.tripod-checkout-form')
				@elseif($equipment->type == 'video-cam' || $equipment->type == 'digital-cam' || $equipment->type == 'dslr-cam')
					@include('equipment.layouts.parts.camera-checkout-form')
				@endif
				{!! BootForm::textarea("&nbsp;", 'note')->rows(3) !!}
				{!! BootForm::submit('Check Out') !!}
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection