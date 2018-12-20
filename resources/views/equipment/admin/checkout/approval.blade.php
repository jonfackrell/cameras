@extends('equipment.layouts.admin')

@section('title')
    Need Approval
@endsection

@section('content')
	<div class="col-12">
		<div class="list-group mt-2"> 
			<div class="row list-group-item header">
				<div class="col-2">
					<h3>Patron</h3>
				</div>
				<div class="col-2">
					<h3>Equipment</h3>
				</div>
				<div class="col-2">
					<h3>Out</h3>
				</div>
				<div class="col-2">
					<h3>Due</h3>
				</div>
				<div class="col-1"></div>
			</div>
			{!! BootForm::open()->post()->action(route('equipment.admin.checkout.approval')) !!}
			@if (sizeof($cameras) > 0)
				<div class="row list-group-item"><h4 class="col-12">CAMERA</h4></div>
			@endif
			@foreach ($cameras as $checkout)
				<div class="row list-group-item link">
					<a class="col-8" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}"><div class="row">
						<div class="col">
							{{ $checkout->patron->getFullNameAttribute() }}
						</div>
						<div class="col">
							{{ $checkout->equipment->getDisplayName() }}
						</div>
						<div class="col">
							{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
						</div>
						@if ($checkout->due_at == NULL && $checkout->isLate())
						<div class="col late">
							Still out
						</div>
						@elseif ($checkout->due_at == NULL)
						<div class="col">
							Still out
						</div>
						@elseif ($checkout->isLate())
						<div class="col late">
							{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
						</div>
						@else
						<div class="col">
							{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
						</div>
						@endif
					</div></a>

					<div class="col-1" style="text-align: right;">$</div>
					<div class="col-2">
						{!! BootForm::text("", "feeAmounts[]")->value($feeAmount )->hideLabel()->disable() !!}
					</div>
					<div class="col-1">
						{!! BootForm::checkbox("", "checkouts[]")->value($checkout->id ) !!}
					</div>
				</div>
			@endforeach

			@if (sizeof($others) > 0)
				<div class="row list-group-item"><h4 class="col-12">OTHER</h4></div>
			@endif
			@foreach ($others as $checkout)
				<div class="row list-group-item link">
					<a class="col-8" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}"><div class="row">
						<div class="col">
							{{ $checkout->patron->getFullNameAttribute() }}
						</div>
						<div class="col">
							{{ $checkout->equipment->getDisplayName() }}
						</div>
						<div class="col">
							{{ $checkout->checked_out_at->tz('America/Denver')->format('M d Y H:i') }}
						</div>
						@if ($checkout->due_at == NULL && $checkout->isLate())
						<div class="col late">
							Still out
						</div>
						@elseif ($checkout->due_at == NULL)
						<div class="col">
							Still out
						</div>
						@elseif ($checkout->isLate())
						<div class="col late">
							{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
						</div>
						@else
						<div class="col">
							{{ $checkout->due_at->tz('America/Denver')->format('M d Y H:i') }}
						</div>
						@endif
					</div></a>

					<div class="col-1" style="text-align: right;">$</div>
					<div class="col-2">
						{!! BootForm::text("", "feeAmounts[]")->value($feeAmount )->hideLabel()->disable() !!}
					</div>
					<div class="col-1">
						{!! BootForm::checkbox("", "checkouts[]")->value($checkout->id ) !!}
					</div>
				</div>
			@endforeach
		</div>

		<div class="row mt-2 justify-content-end"> {!! BootForm::submit('Approve') !!} </div>
		{!! BootForm::close() !!}
	</div>
@endsection

@push('footer-scripts')
<script type="text/javascript">
	$('input:checkbox').change(function() {
		var parent = $(this).parents('.list-group-item');
		var cousin = parent.find('input:text')
		if (this.checked) {
			cousin.prop( 'disabled', false );
		}
		else {
			cousin.prop( 'disabled', true );
		}
	});
	
</script>
@endpush