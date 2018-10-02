@extends('equipment.layouts.admin')

@section('title')
    Cameras
@endsection

@section('content')
	<div id="patron_search" class="col-lg-6">
        
			{!! BootForm::open()->post()->action(route('equipment.admin')) !!}
			<div class="row">
			<div class="col"> 
				{!! BootForm::select('&nbsp', 'type')->options(['inumber' => 'I-number', 'first_name' => 'First Name', 'last_name' => 'Last Name'])->select('inumber') !!}
			</div>
			<div class="col"> 
				{!! BootForm::text('Search for a Patron', 'search')->attribute('v-model:value', 'patron') !!}
			</div>
			</div>
			{!! BootForm::close() !!}
		@if ( sizeof($patrons) > 0 )
			<div class="row">
				<h5 class="col-2">Role</h5>
				<h5 class="col-5">Name</h5>
				<h5 class="col-5">Email</h5>
			</div>
		@endif
		@foreach ( $patrons as $patron )
			<a class="row" id="{{ $patron->id }}" href="{{ route('equipment.admin.show-patron', $patron->id) }}">
				<h6 class="col-2">{{ $patron->role }}</h6>
				<h6 class="col-5">{{ $patron->getFullNameAttribute() }}</h6>
				<h6 class="col-5">{{ $patron->email }}</h6>
			</a>
		@endforeach
	</div>
@endsection

@push('header-scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.0.26/collect.min.js"></script>
	<script>
		

		var vm = new Vue({
			el: '#patron_search',
			data: {
				patron: ''
			},
			watch: {
				patron: function (newPatron, oldPatron) { this.filterPatrons(); }
			},
			methods: {
				filterPatrons: function() {
					var filteredPatrons = 0;
				}
			}
		});

	</script>
@endpush