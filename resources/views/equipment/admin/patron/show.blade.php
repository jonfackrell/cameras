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
							<h6 class="col">{{ $equipmenti->item }}</h6>
							<h6 class="col">{{ $equipmenti->barcode }}</h6>
						</a>
					@endforeach
				@endif

				@if (!empty($message))
					<p class="warning">{{ $message }}</p>
				@endif
			</div>
			<div class="col-md">				
				<h3>Digital</h3>
				{!! BootForm::open()->post()->action(route('equipment.admin.checkin', $patron->id)) !!}
				@foreach ($patron->checkouts as $checkout)
					@if ($checkout->checked_in_at == NULL && $checkout->equipment->group == 'digital')
						<div class="row">
							<h5 class="col"> {{ $checkout->equipment->item }}</h5>
							<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
						</div>
						<div class="row">
							<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}</h6>
							<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>				
							<div class="col-1"> 
								{!! BootForm::checkbox("&nbsp;", "equipment[]")->value($checkout->id ) !!}
							</div>
						</div>
					@endif
				@endforeach
				<h3>In House</h3>
				@foreach ($patron->checkouts as $checkout)
					@if ($checkout->checked_in_at == NULL && $checkout->equipment->group == 'in-house')
						<div class="row">
							<h5 class="col"> {{ $checkout->equipment->item }}</h5>
							<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
						</div>
						<div class="row">
							<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y') }}</h6>
							<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->format('M d Y') }}</h6>				
							<div class="col-1"> 
								{!! BootForm::checkbox("&nbsp;", "equipment[]")->value($checkout->id ) !!}
							</div>
						</div>
					@endif
				@endforeach
				{!! BootForm::textarea("&nbsp;", 'note')->rows(3) !!}
				{!! BootForm::submit('Check In') !!}
				{!! BootForm::close() !!}
			</div>
		</div>
	</div>
@endsection