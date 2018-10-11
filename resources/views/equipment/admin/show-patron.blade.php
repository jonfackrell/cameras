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
			<div class="col">
				<h2>Check Out</h2>
				
			</div>
			<div class="col">
				<h2>History</h2>
				{!! BootForm::open()->post()->action(route('equipment.checkin')) !!}
				@foreach ($patron->checkouts as $checkout)
					@if ($checkout->getCheckedInDate() == ' ')
						<div class="row">
							<h5 class="col"> {{ $checkout->getCheckedOutDate() }}</h5>
							<h5 class="col"> {{ $checkout->getCheckedInDate() }}</h5>
							<div class="col"> 
								{!! BootForm::checkbox("&nbsp;", "equiment[]")->value($checkout->id ) !!}
							</div>
						</div>
					@endif
				@endforeach
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection