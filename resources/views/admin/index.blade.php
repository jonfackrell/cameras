@extends('layouts.admin')

@section('title')
    Cameras
@endsection

@section('content')
	<div id="patron_search" class="col-lg-6">
        <div class="row">
			{!! BootForm::open() !!}
			{!! BootForm::text('Search for a Patron', 'patron')->placeHolder('Name or I#')->required()->attribute('v-model:value', 'patron') !!}
			{!! BootForm::hidden('minutes')->value(0) !!}
			{!! BootForm::close() !!}
		</div>
		<div class="row">
			<h5 class="col-2">Role</h5>
			<h5 class="col-5">Name</h5>
			<h5 class="col-5">Email</h5>
		</div>
		@foreach ( $patrons as $patron )
			<div class="row" id="{{ $patron->id }}">
				<h6 class="col-2">{{ $patron->role }}</h6>
				<h6 class="col-5">{{ $patron->getFullNameAttribute() }}</h6>
				<h6 class="col-5">{{ $patron->email }}</h6>
			</div>
		@endforeach
	</div>
@endsection