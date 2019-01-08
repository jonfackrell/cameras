@extends('equipment.layouts.admin')

@section('title')
    Late Fee Email Notifications (Approval Required)
@endsection

@section('content')
	<div class="col-12">
		<div class="list-group mt-2"> 
			<div class="row list-group-item header">
				<div class="col">
					<h3>Patron</h3>
				</div>
				<div class="col">
					<h3>Equipment</h3>
				</div>
				<div class="col">
					<h3>Late By</h3>
				</div>
				<div class="col-4"></div>
			</div>
			{!! BootForm::open()->post()->action(route('equipment.admin.checkout.approval')) !!}
			


			@foreach ($checkouts->groupBy('equipment.group') as $key => $groups)


				<div class="row list-group-item"><h4 class="col-12">{{ strtoupper($key) }}</h4></div>
				
				@foreach($groups as $checkout)

				<div class="row list-group-item link">
					<a class="col-8" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}"><div class="row">
						<div class="col">
							{{ $checkout->patron->getFullNameAttribute() }}
						</div>
						<div class="col">
							{{ $checkout->equipment->getDisplayName() }}
						</div>						
						<div class="col late">
							{{ str_replace(' after', '', $checkout->checked_in_at->diffForHumans($checkout->due_at)) }}
						</div>
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
			@endforeach
	

			<div class="row mt-2 justify-content-end"> {!! BootForm::submit('Approve') !!} </div>
		{!! BootForm::close() !!}
		</div>
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