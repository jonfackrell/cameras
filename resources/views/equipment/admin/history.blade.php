@extends('equipment.layouts.admin')

@section('title')
    Checkout History
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<div class="col">
				<h3>Patron</h3>
			</div>
			<div class="col-1">
				<h3>Role</h3>
			</div>
			<div class="col-2">
				<h3>Equipment</h3>
			</div>
			<div class="col">
				<h3>Out</h3>
			</div>
			<div class="col">
				<h3>Due</h3>
			</div>
			<div class="col">
				<h3>In</h3>
			</div>
		</div>

		@foreach ($checkouts as $checkout)
			<div class="row">
				<div class="col">
					{{ $checkout->patron->getFullNameAttribute() }}
				</div>
				<div class="col-1">
					{{ $checkout->patron->getRole() }}
				</div>
				<div class="col-2">
					{{ $checkout->equipment->item }}
				</div>
				<div class="col">
					{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				<div class="col">
					{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@if ($checkout->checked_in_at == NULL)
				<div class="col">
					Still out
				</div>
				@else
				<div class="col">
					{{ $checkout->checked_in_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
				@endif
			</div>
		@endforeach

		{{ $checkouts->links() }}
	</div>
@endsection