@extends('equipment.layouts.admin')

@section('title')
    Equipment
@endsection

@section('content')
	
@if (sizeof($equipment) > 0)
	<div class="col-md-8 list-group">
		<div class="row list-group-item header">
			<div class="col-4">
				<h3>Item</h3>
			</div>
			<div class="col-4">
				<h3>Barcode</h3>
			</div>
			<div class="col-4">
				<h3>Type</h3>
			</div>
		</div>

		@if (sizeof($cameras) > 0)
			<div class="row list-group-item"><h4 class="col-12">CAMERA</h4></div>

			@foreach ($cameras as $equipment1)
				<div class="row list-group-item">
					<div class="col-4">
						{{ $equipment1->item }}
					</div>
					<div class="col-4">
						{{ $equipment1->barcode }}
					</div>
					<div class="col-4">
						{{ $equipment1->equipment_type->display_name }}
					</div>
				</div>				
			@endforeach
		@endif

		@if (sizeof($others) > 0)
			<div class="row list-group-item"><h4 class="col-12">OTHER</h4></div>

			@foreach ($others as $equipment1)
				<div class="row list-group-item">
					<div class="col-4">
						{{ $equipment1->item }}
					</div>
					<div class="col-4">
						{{ $equipment1->barcode }}
					</div>
					<div class="col-4">
						{{ $equipment1->equipment_type->display_name }}
					</div>
				</div>				
			@endforeach
		@endif

		@if ($equipment->total() > $pageSize)
			<div class="row list-group-item"> {{ $equipment->links() }} </div>
		@endif

	</div>
@endif
@endsection