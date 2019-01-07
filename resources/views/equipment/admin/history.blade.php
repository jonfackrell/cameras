@extends('equipment.layouts.admin')

@section('title')
    Checkout History    
@endsection

@section('content')
	<div class="col-12">
		{!! BootForm::open()->post()->action(route('equipment.admin.checkouts', ['type' => $type])) !!}
		<div class="row">
			<div class="col-lg-6 col-md-8"> 
				{!! BootForm::text('', 'search')->placeholder('first name, last name, or i-number') !!}
			</div>
		</div>
		{!! BootForm::close() !!}
		<div class="list-group mt-2 mb-2">
			<div class="row list-group-item header">
				<div class="col-3">
					<h3>Patron</h3>
				</div>
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
				<a class="row list-group-item" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}">
					<div class="col-3">
						{{ $checkout->patron->getFullNameAttribute() }}
					</div>
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
		</div>

		{{ $checkouts->links() }}

	</div>
@endsection