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
				<div class="col-3">
					<h3>Equipment</h3>
				</div>
				<div class="col-3">
					<h3>Out</h3>
				</div>
				<div class="col-3">
					<h3>Due</h3>
				</div>
				<div class="col-1"></div>
			</div>
			{!! BootForm::open()->post()->action(route('equipment.admin.checkout.approval')) !!}
			@foreach ($checkouts as $checkout)
				<a class="row list-group-item" href="{{ route('equipment.admin.checkout.show', ['checkout' => $checkout->id]) }}">
					<div class="col-2">
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

					<div class="col-1">
						{!! BootForm::checkbox("", "checkouts[]")->value($checkout->id ) !!}
					</div>
				</a>
			@endforeach
		</div>

		<div class="row mt-2 justify-content-end"> {!! BootForm::submit('Approve') !!} </div>
		{!! BootForm::close() !!}
	</div>
@endsection