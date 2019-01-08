@extends('equipment.layouts.admin')

@section('title')

@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<div class="col">
				<div class="media">
					<img src="https://via.placeholder.com/80" class="mr-3" alt="Photo">
					<div class="media-body">
						<div class="row">
							<div class="col-md-8">
								<h5 class="mt-0" style="font-weight: bold;">{{ $patron->getFullNameAttribute() }}</h5>
								<div>
									{{ $patron->email }}
								</div>
								<div>
									{{ $patron->inumber }}
								</div>
							</div>
							<div class="col-md-4">
								@if ($patron->canCheckout('camera', true))
									<h5>Class/Purpose: {{ $patron->checkout_reason }}</h5>
								@endif
								@if ($patron->areTermsAgreed())
									<h5 class="green">{{ $patron->getCheckoutPeriodText() }}</h5>
								@else
									<h5 class="warning">{{ $patron->getCheckoutPeriodText() }}</h5>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix">&nbsp;</div>
		<div class="row">
			<div class="col-md-12">
				@if ($patron->areTermsAgreed())
					<h3>Check Out</h3>
					{!! BootForm::open()->post()->action(route('equipment.admin.patron.show', $patron->id)) !!}
						{!! BootForm::text('', 'search')->placeholder('Item or Barcode') !!}
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
					<p class="alert alert-danger">{{ $message }}</p>
				@endif
			</div>
			<div class="col-md-12">
				@if (!$patron->canCheckout('camera', true))
					<a href="{{ route('equipment.admin.patron.authorize', $patron->id) }}" class="btn warning btn-block">Authorize</a>
				@endif
			</div>
			<div class="col-md-12">

				@if(isset($checkouts) && $checkouts->count() > 0)

					<hr />

					{!! BootForm::open()->post()->action(route('equipment.admin.checkin', $patron->id)) !!}

						@foreach ($checkouts->groupBy('equipment.group') as $key => $groups)

							<h3>{{ strtoupper($key) }}</h3>

							@foreach($groups as $checkout)

							<div class="row">
								<h5 class="col"> {{ $checkout->equipment->getDisplayName() }}</h5>
								@if (!is_null($checkout->equipment->barcode))
									<h5 class="col"> {{ $checkout->equipment->barcode }}</h5>
								@endif
								<div class="col-1">
									<a href="{{ route('equipment.admin.checkout.edit', $checkout->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
							<div class="row">
								@foreach($checkout->getMedia('checkouts') as $image)
									<div class="col-2">
										<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 40px; width: auto;"/>
									</div>
								@endforeach
							</div>

							@endforeach

						@endforeach

						{!! BootForm::textarea("&nbsp;", 'note')->rows(3) !!}
						{!! BootForm::submit('Check In') !!}

					{!! BootForm::close() !!}

				@endif

				{{--
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
								<a href="{{ route('equipment.admin.checkout.edit', $checkout->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
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
						<div class="row">
							@foreach($checkout->getMedia('checkouts') as $image)
								<div class="col-2">
									<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 40px; width: auto;"/>
								</div>
							@endforeach
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
				--}}
			</div>
		</div>
	</div>

	<div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<img src="" class="enlargeImageModalSource" style="width: 100%;">
				</div>
			</div>
		</div>
	</div>
@endsection

@push('styles')
	<style>
		img.checkout-thumbnail {
			cursor: zoom-in;
		}
	</style>
@endpush

@push('footer-scripts')
	<script>
		$(function() {
			$('img.checkout-thumbnail').on('click', function() {
				$('.enlargeImageModalSource').attr('src', $(this).data('full'));
				$('#enlargeImageModal').modal('show');
			});
		});
	</script>
@endpush