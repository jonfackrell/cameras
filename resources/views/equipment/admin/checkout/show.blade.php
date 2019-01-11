@extends('equipment.layouts.admin')

@section('title')
    Checkout Details
@endsection

@section('content')
	<div class="clearfix">&nbsp;</div>
	<div class="col-12">
		<div class="card bg-light mb-3" style="">
			<div class="card-header" style="line-height: 2.3;">
				<div class="row">
					<div class="col-md-9">
						Patron Information ({{ $checkout->patron->getRole() }})
					</div>
					<div class="col-md-3">
						<a href="{{ route('equipment.admin.patron.history', ['patron' => $checkout->patron->id]) }}"
						   class="btn btn-default btn-block">
							History
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<h5 class="card-title">Name</h5>
						<div class="card-text">
							{{ $checkout->patron->getFullNameAttribute() }}
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">I-Number</h5>
						<div class="card-text">
							{{ $checkout->patron->inumber }}
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">Email</h5>
						<div class="card-text">
							{{ $checkout->patron->email }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card bg-light mb-3" style="">
			<div class="card-header" style="line-height: 2.3;">
				<div class="row">
					<div class="col-md-9">
						Equipment
					</div>
					<div class="col-md-3">

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<h5 class="card-title">Item</h5>
						<div class="card-text">
							{{ $checkout->equipment->item }}
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">Barcode</h5>
						<div class="card-text">
							{{ $checkout->equipment->barcode }}
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">Description</h5>
						<div class="card-text">
							{{ $checkout->equipment->description }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card bg-light mb-3" style="">
			<div class="card-header" style="line-height: 2.3;">
				<div class="row">
					<div class="col-md-9">
						Images
					</div>
					<div class="col-md-3">

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					@foreach($checkout->getMedia('checkouts') as $image)
						<div class="col-2">
							<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 80px; width: auto;"/>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card bg-light mb-3" style="">
			<div class="card-header" style="line-height: 2.3;">
				<div class="row">
					<div class="col-md-9">
						Checkout Information
					</div>
					<div class="col-md-3">

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<h5 class="card-title">Out</h5>
						<div class="card-text">
							{{ $checkout->checked_out_at->tz('America/Denver')->toDayDateTimeString()}}
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">Due</h5>
						<div class="card-text">
							{{ $checkout->due_at->tz('America/Denver')->toDayDateTimeString() }}
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">Checked Out By</h5>
						<div class="card-text">
							{{ $checkout->who_checked_out->getFullNameAttribute() }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! $checkout->checkout_note !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card bg-light mb-3" style="">
			<div class="card-header" style="line-height: 2.3;">
				<div class="row">
					<div class="col-md-9">
						Checkin Information
					</div>
					<div class="col-md-3">

					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<h5 class="card-title">In</h5>
						<div class="card-text">
							@if (is_null($checkout->checked_in_at))
								Checked Out
							@else
								{{ $checkout->checked_in_at->tz('America/Denver')->toDayDateTimeString() }}
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">&nbsp;</h5>
						<div class="card-text">
							@if (is_null($checkout->checked_in_at) && $checkout->due_at < now())
								Due {{ str_replace( [' before', ' after'], '', now()->diffForHumans($checkout->due_at)) }} ago
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<h5 class="card-title">Checked In By</h5>
						<div class="card-text">
							@if (!empty($checkout->checked_in_by))
								{{ $checkout->who_checked_in->getFullNameAttribute() }}
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! $checkout->checkin_note !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	@if($checkout->emails->count() > 0)
		<div class="col-12">
			<table class="table">
				<thead>
				<tr>
					<th scope="col">Subject</th>
					<th scope="col">Email</th>
					<th scope="col">Sent</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($checkout->emails as $message)
					<tr>
						<td>
							<a href="{{ route('equipment.admin.checkout.email.show', ['email' => $message]) }}" target="_blank">
								{{ $message->subject }}
							</a>
						</td>
						<td>
							{{ $message->email }}
						</td>
						<td>
							{{ $message->created_at->tz('America/Denver')->toDayDateTimeString() }}
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
		</div>
	@endif


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