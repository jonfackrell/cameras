@extends('equipment.layouts.admin')

@section('title')
	<a href="{{ route('equipment.admin.patron.history', ['patron' => $checkout->patron->id]) }}"
	   class="col-md-3 btn btn-default pull-right">
		Patron History
	</a>
    Checkout Details
@endsection

@section('content')
	<div class="col-12">
		<div class="row">
			<h4 class="col-3">
				Patron
			</h4>
		

		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Name</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->patron->getFullNameAttribute() }}
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Role</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->patron->getRole() }}
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">I-number</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->patron->inumber }}
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Email</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->patron->email }}
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-2">
			<h4 class="col">
				Equipment
			</h4>
		</div>
		<div class="row">
			@if (!is_null($checkout->equipment->item))
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Item</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->equipment->item }}
					</div>
				</div>
			</div>
			@endif
			@if (!is_null($checkout->equipment->barcode))
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Barcode</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->equipment->barcode }}
					</div>
				</div>
			</div>
			@endif
			<div class="col-md">
				<div class="row">
					<h5 class="col-12">Description</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->equipment->description }}
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-2">
			<h4 class="col">
				Checkout
			</h4>
		</div><div class="row">
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Out</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Due</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">In</h5>
				</div>
				<div class="row">
					<div class="col-12">
						@if ($checkout->checked_in_at == NULL)
							Still out
						@else
							{{ $checkout->checked_in_at->tz('America/Denver')->format('M d Y H:i') }}
						@endif
					</div>
				</div>
			</div>
		</div>
		
		<div class="row mt-2">
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">Out By</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->who_checked_out->getFullNameAttribute() }}
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<h5 class="col-12">In By</h5>
				</div>
				<div class="row">
					<div class="col-12">
						@if (!empty($checkout->checked_in_by))
							{{ $checkout->who_checked_in->getFullNameAttribute() }}
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-md-6">
				<div class="row">
					<h5 class="col-12">Checkout Note</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->checkout_note }}
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<h5 class="col-12">Checkin Note</h5>
				</div>
				<div class="row">
					<div class="col-12">
						{{ $checkout->checkin_note }}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<h5 class="col-12">Images</h5>
		</div>
		<div class="row">
			@foreach($checkout->getMedia('checkouts') as $image)
				<div class="col-2">
					<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 80px; width: auto;"/>
				</div>
			@endforeach
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