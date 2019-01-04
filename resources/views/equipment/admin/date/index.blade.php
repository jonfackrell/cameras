@extends('equipment.layouts.admin')

@section('title')
    Dates
@endsection

@section('content')
	<div class="col-lg-8 list-group mt-2 mb-2">
		<div class="row list-group-item header">
			<div class="col">
				<h3>Description</h3>
			</div>
			<div class="col">
				<h3>End At</h3>
			</div>
		</div>

		@foreach ($dates as $date)
			<a class="row list-group-item" href="{{ route('equipment.admin.date.edit', ['date' => $date->id]) }}">
				<div class="col">
					{{ $date->description }}
				</div>
				<div class="col">
					{{ $date->end_at->tz('America/Denver')->format('M d Y H:i') }}
				</div>
			</a>
		@endforeach

		</div>
	</div>
	
@endsection