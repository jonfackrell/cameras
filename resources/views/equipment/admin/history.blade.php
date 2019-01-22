@extends('equipment.layouts.admin')

@section('title')
    Checkout History    
@endsection

@section('content')
	<div class="col-12">
		{!! BootForm::open()->get()->action(route('equipment.admin.checkouts.history')) !!}
		<div class="row">
			<div class="col-lg-12 col-md-12">
				{!! BootForm::text('', 'search')->placeholder('First Name, Last Name, or I-Number')->value(request()->get('search', ''))->autofocus() !!}
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<legend style="font-size: 14px; font-weight: bold;">Equipment Type</legend>
				<div class="row">
					<div class="col">
						{!! BootForm::radio(' All', 'equipment_type')->value('all')->{(request()->get('equipment_type', 'all') == 'all')?'check':'uncheck'}() !!}
					</div>
					<div class="col">
						{!! BootForm::radio(' Cameras', 'equipment_type')->value('camera')->{(request()->get('equipment_type') == 'camera')?'check':'uncheck'}() !!}
					</div>
					<div class="col">
						{!! BootForm::radio(' Other', 'equipment_type')->value('other')->{(request()->get('equipment_type') == 'other')?'check':'uncheck'}() !!}
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1">

			</div>
			<div class="col-lg-5 col-md-5">
				<legend style="font-size: 14px; font-weight: bold;">Status</legend>
				<div class="row">
					<div class="col">
						{!! BootForm::radio(' All', 'status')->value('all')->{(request()->get('status', 'all') == 'all')?'check':'uncheck'}() !!}
					</div>
					<div class="col">
						{!! BootForm::radio(' In', 'status')->value('in')->{(request()->get('status') == 'in')?'check':'uncheck'}() !!}
					</div>
					<div class="col">
						{!! BootForm::radio(' Out', 'status')->value('out')->{(request()->get('status') == 'out')?'check':'uncheck'}() !!}
					</div>
				</div>
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

@push('footer-scripts')
	<script>
		$(function(){

			$(document).on('change', 'input[name="equipment_type"], input[name="status"]', function(){
				$(this).closest('form').submit();
			});

		});
	</script>
@endpush
