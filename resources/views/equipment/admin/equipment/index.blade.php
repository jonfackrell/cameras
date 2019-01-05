@extends('equipment.layouts.admin')

@section('title')
    Equipment
@endsection

@section('content')
	
@if (sizeof($equipment) > 0)
	<div class="col-md-8 list-group">
		<div class="row list-group-item header">
			<div class="col-3">
				<h3>Item</h3>
			</div>
			<div class="col-3">
				<h3>Barcode</h3>
			</div>
			<div class="col-3">
				<h3>Type</h3>
			</div>
			<div class="col-3">
				<h3>Group</h3>
			</div>
		</div>

		@foreach ($equipment as $equipment1)
			<div class="row list-group-item">
				<div class="col-3">
					{{ $equipment1->item }}
				</div>
				<div class="col-3">
					{{ $equipment1->barcode }}
				</div>
				<div class="col-3">
					{{ $equipment1->equipment_type->display_name }}
				</div>
				<div class="col-3">
					{{ $equipment1->group }}
				</div>
			</div>				
		@endforeach

		@if ($equipment->total() > $pageSize)
			<div class="row list-group-item"> {{ $equipment->links() }} </div>
		@endif

	</div>
@endif

<div class="col-md"><a class="btn btn-default" href="{{ route('equipment.admin.equipment.create') }}">Add New Equiment</a></div>
@endsection