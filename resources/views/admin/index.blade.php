@extends('layouts.admin')

@section('title')
    Cameras
@endsection

@section('content')
	<div id="patron_search" class="col-md-6">
        <div class="row">
			{!! BootForm::open() !!}
			{!! BootForm::text('Search for a Patron', 'patron')->placeHolder('Name or I#')->required()->attribute('v-model:value', 'patron') !!}
			{!! BootForm::hidden('minutes')->value(0) !!}
			{!! BootForm::close() !!}
		</div>
		@foreach ( $patrons as $patron )
			<div class="row">
				<h6 class="col-md-2">{{ $patron->role }}</h6>
				<h6 class="col">{{ $patron->getFullNameAttribute() }}</h6>
				<h6 class="col">{{ $patron->email }}</h6>
			</div>
		@endforeach
	</div>
@endsection