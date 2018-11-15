@extends('equipment.layouts.admin')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<div class="col">
				<h5>{{ $patron->email }}</h5>
				<h5>{{ $patron->inumber }}</h5>
				@if ($patron->areTermsAgreed())
				<h5 class="green col-3">{{ $patron->getCheckoutPeriodText() }}</h5>
				@else
				<h5 class="warning col-3">{{ $patron->getCheckoutPeriodText() }}</h5>
				@endif
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md">				
				@if ($patron->areTermsAgreed())
					<h3>Check Out</h3>
					{!! BootForm::open()->post()->action(route('equipment.admin.patron.show', $patron->id)) !!}
					{!! BootForm::text('&nbsp', 'search')->placeholder('item or barcode') !!}
					{!! BootForm::close() !!}

					@if (sizeof($equipment) > 0)
						<div class="row">
							<h5 class="col">Item</h5>
							<h5 class="col">Barcode</h5>
						</div>
					@endif
					
					@foreach ( $equipment as $equipmenti )
						<a class="row" id="{{ $equipmenti->id }}" href="{{ route('equipment.admin.checkout.create', ['patron' => $patron->id, 'equipment' => $equipmenti->id]) }}">
							<h6 class="col">{{ $equipmenti->getDisplayName() }}</h6>
							<h6 class="col">{{ $equipmenti->barcode }}</h6>
						</a>
					@endforeach
				@endif

				@if (!empty($message))
					<p class="warning">{{ $message }}</p>
				@endif
			</div>
			<div class="col-md">
				
				@if (sizeof($cameras) > 0 || sizeof($others) > 0)	
					{!! BootForm::open()->post()->action(route('equipment.admin.checkin', $patron->id)) !!}

					@if (sizeof($cameras) > 0)				
						<h3>Camera</h3>
					@endif

					@foreach ($cameras as $checkout)
						<div class="row">
							<h5 class="col"> {{ $checkout->equipment->getDisplayName() }}</h5>
							@if (!is_null($checkout->equipment->barcode))
							<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
							@endif
							<div class="col-1">
								<i class="fa fa-edit" aria-hidden="true"></i>
							</div>
						</div>
						<div class="row">
							<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}</h6>
							@if ($checkout->isLate())
							<h6 class="col late"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
							@else
							<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
							@endif				
							<div class="col-1"> 
								{!! BootForm::checkbox("&nbsp;", "equipment[]")->value($checkout->id ) !!}
							</div>
						</div>
					@endforeach

					@if (sizeof($others) > 0)	
						<h3>Other</h3>
					@endif

					@foreach ($others as $checkout)
						<div class="row">
							<h5 class="col"> {{ $checkout->equipment->getDisplayName() }}</h5>
							@if (!is_null($checkout->equipment->barcode))
							<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
							@endif
							<div class="col-1"></div>
						</div>
						<div class="row">
							<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}</h6>
							@if ($checkout->isLate())
							<h6 class="col late"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
							@else
							<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>
							@endif				
							<div class="col-1"> 
								{!! BootForm::checkbox("&nbsp;", "equipment[]")->value($checkout->id ) !!}
							</div>
						</div>
					@endforeach

					{!! BootForm::textarea("&nbsp;", 'note')->rows(3) !!}
					{!! BootForm::submit('Check In') !!}
					{!! BootForm::close() !!}
				@endif
			</div>
		</div>
	</div>
@endsection