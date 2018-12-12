@extends('equipment.layouts.patron')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection


@section('content')
	<div>Welcome {{ $patron->getFullNameAttribute() }}</div>
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
	@else
		<p>You currently have no equipment from the Mac Lab checked out.</p>
	@endif

	@if (sizeof($checkouts) > $pageSize)
		<div class="row list-group-item"> {{ $checkouts->links() }} </div>
	@endif

	</div>
	
@endsection