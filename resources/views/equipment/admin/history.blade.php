@extends('equipment.layouts.admin')

@section('title')
    Checkout History
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<div class="col-2">
				<h3>Patron</h3>
			</div>
			<div class="col-2">
				<h3>Equipment</h3>
			</div>
			<div class="col-2">
				<h3>Out</h3>
			</div>
			<div class="col-1">
				<h3>By</h3>
			</div>
			<div class="col-2">
				<h3>Due</h3>
			</div>
			<div class="col-2">
				<h3>In</h3>
			</div>
			<div class="col-1">
				<h3>By</h3>
			</div>
		</div>

		@foreach ($checkouts as $checkout)
			<a class="row mb-2" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}">
				<div class="col-2">
					{{ $checkout->patron->getFullNameAttribute() }}
				</div>
				<div class="col-2">
					{{ $checkout->equipment->item }}
				</div>
				<div class="col-2">
					{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				<div class="col-1">
					{{ $checkout->who_checked_out->getFullNameAttribute() }}
				</div>
				<div class="col-2">
					{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@if ($checkout->checked_in_at == NULL && $checkout->isLate())
				<div class="col-2 late">
					Still out
				</div>
				@elseif ($checkout->checked_in_at == NULL)
				<div class="col-2">
					Still out
				</div>
				@elseif ($checkout->isLate())
				<div class="col-2 late">
					{{ $checkout->checked_in_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@else
				<div class="col-2">
					{{ $checkout->checked_in_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@endif
				<div class="col-1">
					@if (!empty($checkout->checked_out_by))
					{{ $checkout->who_checked_in->getFullNameAttribute() }}
					@endif
				</div>
			</a>
		@endforeach

		{{ $checkouts->links() }}
	</div>
@endsection