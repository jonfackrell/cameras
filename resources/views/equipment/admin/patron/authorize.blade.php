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
			<div class="col-md">
					{!! BootForm::open()->post()->action(route('equipment.admin.patron.authorize', $patron->id)) !!}
					{!! BootForm::text('&nbsp', 'checkout_reason')->placeholder('item or barcode') !!}
					{!! BootForm::text('&nbsp', 'checkout_period')->placeholder('item or barcode') !!}
					{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection