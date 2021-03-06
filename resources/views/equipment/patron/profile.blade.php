@extends('equipment.layouts.patron')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('breadcrumbs')
	<a href="{{ route('maclab.home') }}">MAC LAB</a>
	/
	<a href="{{ route('equipment.home') }}">EQUIPMENT</a>
	/
	<span> {{ strtoupper( $patron->getFullNameAttribute()) }}</span>
@endsection


@section('content')

	<div class="row">
		<div class="col-md-12">
			<h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
				CURRENTLY CHECKED OUT
			</h2>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>

	<div class="row">
		{{--<div class="col-md-5">
			<h4>You can checkout the following types of equipment:</h4>
			<ul class="bullets row">
				@foreach ($types as $type)
					<li class="col-md-6">{{ $type->display_name }}</li>
				@endforeach
			</ul>

			@if (!$patron->canCheckout('camera'))
				<p>You are not currently authorized to use camera equipment. You can self authorize by filling out the academic purpose you need the camera equipment for, and then hitting "Self Authorize". By hitting "Self Authorize" you agree that you need camera equipment for an academic purpose and that you will follow the terms and conditions of use for the equipment.</p>

				{!! BootForm::open()->post()->action(route('equipment.patron.authorize')) !!}
				{!! BootForm::text('Class/Purpose', 'checkout_reason') !!}
				{!! BootForm::submit('Self Authorize') !!}
				{!! BootForm::close() !!}
			@endif

			<div class="clear-fix">&nbsp;</div>

			<a href="{{ route('equipment.patron.terms') }}">View Terms and Conditions</a>

		</div>
		<div class="col-md-1"></div> --}}



		@if ($checkouts->count() > 0)
			<div class="col-md-12" style="padding: 0px 30px;">
				<div class="list-group">
					<div class="row list-group-item header">
						<div class="col-4">
							<h3></h3>
						</div>
						<div class="col-4">
							<h3>Out</h3>
						</div>
						<div class="col-4">
							<h3>Due</h3>
						</div>
					</div>

					@if (sizeof($cameras) > 0)
						<div class="row list-group-item"><h4 class="col-12">CAMERA</h4></div>

						@foreach ($cameras as $checkout)
							<div class="row list-group-item" >
								<div class="col-4">
									{{ $checkout->equipment->getDisplayName() }}
								</div>
								<div class="col-4">
									{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
								</div>
								@if ($checkout->isLate())
								<div class="col-4 late">
									{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
								</div>
								@else
								<div class="col-4">
									{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
								</div>
								@endif
							</div>
						@endforeach
					@endif

					@if (sizeof($others) > 0)
						<div class="row list-group-item"><h4 class="col-12">OTHER</h4></div>

						@foreach ($others as $checkout)
							<div class="row list-group-item">
								<div class="col-4">
									{{ $checkout->equipment->getDisplayName() }}
								</div>
								<div class="col-4">
									{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}
								</div>
								@if ($checkout->isLate())
								<div class="col-4 late">
									{{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}
								</div>
								@else
								<div class="col-4">
									{{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}
								</div>
								@endif
							</div>
						@endforeach
					@endif
				@else
					<div class="col-md-12">
					<p>You currently have no equipment from the Mac Lab checked out.</p>
				@endif
			</div>
		</div>
	</div>
	
@endsection

@push('styles')
	<style type="text/css">
		label {
			font-family: 'Oswald', sans-serif;
			font-size: 1.5em;
		}
		.late { color: #a5216f; }
	</style>
@endpush