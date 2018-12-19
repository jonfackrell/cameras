@extends('equipment.layouts.admin')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<div class="col">
				<h5>{{ $patron->email }}</h5>
				<h5>{{ $patron->inumber }}</h5>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-8">
				{!! BootForm::open()->post()->action(route('equipment.admin.patron.authorize', $patron->id)) !!}
				{!! BootForm::text('Class/Purpose', 'checkout_reason') !!}
				{!! BootForm::select('Checkout Period', 'checkout_period')->options([1 => '24 Hours', 2 => '48 Hours', 3 => '3 Days', 7 => '1 Week', 14 => '2 Weeks']) !!}
				{!! BootForm::submit('Authorize') !!}
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection