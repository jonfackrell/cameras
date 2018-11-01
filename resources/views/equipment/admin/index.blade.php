@extends('equipment.layouts.admin')

@section('title')
    Search
@endsection

@section('content')
	<div id="patron_search" class="col-lg-6">
        
		{!! BootForm::open()->post()->action(route('equipment.admin')) !!}
		<div class="row">
			<div class="col"> 
				{!! BootForm::text('&nbsp', 'search')->placeholder('first name, last name, or i-number') !!}
			</div>
		</div>
		{!! BootForm::close() !!}
		@if (sizeof($patrons) > 0)
			<div class="row">
				<h5 class="col-2">Role</h5>
				<h5 class="col-5">Name</h5>
				<h5 class="col-5">Email</h5>
			</div>
		@endif
		
		@foreach ( $patrons as $patron )
			<a class="row" id="{{ $patron->id }}" href="{{ route('equipment.admin.patron.show', $patron->id) }}">
				<h6 class="col-2">{{ $patron->getRole() }}</h6>
				<h6 class="col-5">{{ $patron->getFullNameAttribute() }}</h6>
				<h6 class="col-5">{{ $patron->email }}</h6>
			</a>
		@endforeach

		@if (!empty($message))
			<p>{{ $message }}</p>
		@endif
	</div>
@endsection
