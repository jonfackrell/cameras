@extends('equipment.layouts.admin')

@section('title')

@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<div class="col">
				<div class="media">
					<img src="https://web.byui.edu/Directory/Student/{{ explode('@', $patron->email)[0] }}.jpg" class="mr-3" alt="Photo" style="width: 80px; height: 80px;">
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
						{!! BootForm::text('', 'search')->placeholder('Item or Barcode')->value(request()->get('search'))->autofocus() !!}
					{!! BootForm::close() !!}

					@if(isset($equipment) && $equipment->count() > 0)
						<h3>Available Items</h3>
						<table class="table table-striped table-hover">
							<thead>
							<tr>
								<th scope="col">

								</th>
								<th scope="col">Group</th>
								<th scope="col">Type</th>
								<th scope="col">Item</th>
								<th scope="col">Barcode</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($equipment as $equipment1)
								<tr onclick="javascript: location.href = '{{ route('equipment.admin.checkout.create', ['patron' => $patron->id, 'equipment' => $equipment1->id]) }}';">
									<td>
										@foreach($equipment1->equipment_type->getMedia('equipment-type') as $image)
											<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 30px; width: auto;"/>
										@endforeach
									</td>
									<td>
										{{ $equipment1->group }}
									</td>
									<td>
										{{ $equipment1->equipment_type->display_name }}
									</td>
									<td>
										{{ $equipment1->item }}
									</td>
									<td>
										{{ $equipment1->barcode }}
									</td>
								</tr>
							@endforeach
							</tbody>
							<tfoot>
							<tr>
								<td colspan="5">

								</td>
							</tr>
							</tfoot>
						</table>
					@endif


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
								<h6 class="col"><strong>Out:</strong> {{ $checkout->checked_out_at->tz('America/Denver')->toDayDateTimeString() }}</h6>
								@if ($checkout->isLate())
									<h6 class="col late"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->toDayDateTimeString() }}</h6>
								@else
									<h6 class="col"><strong>Due:</strong> {{ $checkout->due_at->tz('America/Denver')->toDayDateTimeString() }}</h6>
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
	<iframe src="https://web.byui.edu/Directory/Support/Login?returnUrl=https%3A%2F%2Fweb.byui.edu%2FDirectory%2FStudent%2F" style="border: none; width: 1px; height: 1px;"></iframe>
@endsection

@push('styles')
	<style>
		img.checkout-thumbnail {
			cursor: zoom-in;
		}
		table.table tr{cursor:pointer;}
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