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
				<h3>Check Out</h3>
				{!! BootForm::open()->post()->action(route('equipment.checkout', $patron->id)) !!}
				{!! BootForm::text('&nbsp', 'search') !!}
				{!! BootForm::close() !!}
				@if (!empty($message))
					<p>{{ $message }}</p>
				@endif
			</div>
			<div class="col-md">
				<h3>History</h3>
				{!! BootForm::open()->post()->action(route('equipment.checkin', $patron->id)) !!}
				@foreach ($patron->checkouts as $checkout)
					@if ($checkout->getCheckedInDate() == ' ')
						<div class="row">
							<h5 class="col"> {{ $checkout->equipment->item }}</h5>
							<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
						</div>
						<div class="row">
							<h6 class="col"><strong>Out:</strong> {{ $checkout->getCheckedOutDate() }}</h6>
							<h6 class="col"><strong>Due:</strong> {{ $checkout->getDueDate() }}</h6>				
							<div class="col-1"> 
								{!! BootForm::checkbox("&nbsp;", "equipment[]")->value($checkout->id ) !!}
							</div>
						</div>
					@endif
				@endforeach
				{!! BootForm::submit('Check In') !!}
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection