@extends('equipment.layouts.admin')

@section('title')
    <a class="btn btn-default pull-right" href="{{ route('equipment.admin.equipment.create') }}">Add New Equiment</a>
    Equipment
@endsection

@section('content')
	
@if (sizeof($equipment) > 0)
	<div class="col-md-12 list-group">
		<div class="row list-group-item header">
			<div class="col-1">

			</div>
			<div class="col-2">
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
				<div class="col-1">
					@foreach($equipment1->getMedia('equipment') as $image)
						<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 30px; width: auto;"/>
					@endforeach
				</div>
				<div class="col-1">
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


@endsection