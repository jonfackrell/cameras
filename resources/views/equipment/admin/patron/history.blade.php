@extends('equipment.layouts.admin')

@section('title')
    Patron History
@endsection

@section('content')
	<div class="col-md-4">
		<div class="row">
			<div class="col">
				<h3>{{ $patron->getFullNameAttribute() }}</h3>
				@if ($patron->canCheckout('camera', true))
				<h5>Class/Purpose: {{ $patron->checkout_reason }}</h5>
				@endif
				<h5>{{ $patron->email }}</h5>
				<h5>{{ $patron->inumber }}</h5>
				@if ($patron->areTermsAgreed())
				<h5 class="green col-md-6 col-3">{{ $patron->getCheckoutPeriodText() }}</h5>
				@else
				<h5 class="warning col-md-6 col-3">{{ $patron->getCheckoutPeriodText() }}</h5>
				@endif
			</div>
		</div>
	</div>
@if (sizeof($checkouts) > 0)
	<div class="col-md list-group">
		<div class="row list-group-item header">
			<div class="col-4">
				<h3>Equipment</h3>
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
				<a class="row list-group-item" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}">
					<div class="col-4">
						{{ $checkout->equipment->getDisplayName() }}
					</div>
					<div class="col-4">
						{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
					@if ($checkout->due_at == NULL && $checkout->isLate())
					<div class="col-4 late">
						Still out
					</div>
					@elseif ($checkout->due_at == NULL)
					<div class="col-4">
						Still out
					</div>
					@elseif ($checkout->isLate())
					<div class="col-4 late">
						{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
					@else
					<div class="col-4">
						{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
					@endif
				</a>
			@endforeach
		@endif

		@if (sizeof($others) > 0)
			<div class="row list-group-item"><h4 class="col-12">OTHER</h4></div>

			@foreach ($others as $checkout)
				<a class="row list-group-item" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}">
					<div class="col-4">
						{{ $checkout->equipment->getDisplayName() }}
					</div>
					<div class="col-4">
						{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
					@if ($checkout->due_at == NULL && $checkout->isLate())
					<div class="col-4 late">
						Still out
					</div>
					@elseif ($checkout->due_at == NULL)
					<div class="col-4">
						Still out
					</div>
					@elseif ($checkout->isLate())
					<div class="col-4 late">
						{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
					@else
					<div class="col-4">
						{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
					@endif
				</a>
			@endforeach
		@endif

		@if (sizeof($checkouts) > $pageSize)
			<div class="row list-group-item"> {{ $checkouts->links() }} </div>
		@endif

	</div>
@endif
@endsection