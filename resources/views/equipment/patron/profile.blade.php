@extends('equipment.layouts.patron')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection


@section('content')
	<div>Welcome {{ $patron->getFullNameAttribute() }}</div>
	@if (sizeof($cameras) > 0 || sizeof($others) > 0)	

		@if (sizeof($cameras) > 0)				
			<h3>Camera Equipment</h3>
		@endif

		@foreach ($cameras as $checkout)
			<div class="row">
				<h5 class="col"> {{ $checkout->equipment->getDisplayName() }}</h5>
				@if (!is_null($checkout->equipment->barcode))
				<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
				@endif
			</div>
			<div class="row">
				<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}</h6>
				@if ($checkout->isLate())
				<h6 class="col late"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
				@else
				<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
				@endif	
			</div>
		@endforeach

		@if (sizeof($others) > 0)	
			<h3>Other Equipment</h3>
		@endif

		@foreach ($others as $checkout)
			<div class="row">
				<h5 class="col"> {{ $checkout->equipment->getDisplayName() }}</h5>
				@if (!is_null($checkout->equipment->barcode))
				<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
				@endif
			</div>
			<div class="row">
				<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}</h6>
				@if ($checkout->isLate())
				<h6 class="col late"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
				@else
				<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
				@endif	
			</div>
		@endforeach
	@else
		<p>You currently have no equipment from the Mac Lab checked out.</p>
	@endif
@endsection