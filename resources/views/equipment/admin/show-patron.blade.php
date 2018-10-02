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
				@foreach ($checkouts as $checkout)
				<div class="row">
					<h5 class="col"> {{ $checkout->getCheckedOutDate() }}</h5>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection