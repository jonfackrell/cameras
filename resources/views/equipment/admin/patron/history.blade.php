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
	<div class="col-md">
		<div class="row">
			<div class="col-3">
				<h3>Equipment</h3>
			</div>
			<div class="col-3">
				<h3>Out</h3>
			</div>
			<div class="col-3">
				<h3>Due</h3>
			</div>
		</div>

		@foreach ($checkouts as $checkout)
			<a class="row mb-2" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}">
				<div class="col-3">
					{{ $checkout->equipment->getDisplayName() }}
				</div>
				<div class="col-3">
					{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@if ($checkout->due_at == NULL && $checkout->isLate())
				<div class="col-3 late">
					Still out
				</div>
				@elseif ($checkout->due_at == NULL)
				<div class="col-3">
					Still out
				</div>
				@elseif ($checkout->isLate())
				<div class="col-3 late">
					{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@else
				<div class="col-3">
					{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@endif
			</a>
		@endforeach

		{{ $checkouts->links() }}

	</div>
@endsection