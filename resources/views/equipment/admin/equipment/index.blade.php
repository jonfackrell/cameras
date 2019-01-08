@extends('equipment.layouts.admin')

@section('title')
    Equipment
@endsection

@section('content')
	
@if (sizeof($equipment) > 0)
	<div class="col-md-12">

		<table class="table">
			<thead>
			<tr>
				<th scope="col" style="width: 30px;">
					<a class="btn btn-default btn-sm" href="{{ route('equipment.admin.equipment.create') }}">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Add
					</a>
				</th>
				<th scope="col">Group</th>
				<th scope="col">Type</th>
				<th scope="col">Item</th>
				<th scope="col">Barcode</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($equipment as $equipment1)
				<tr>
					<td>
						@foreach($equipment1->equipment_type->getMedia('equipment-type') as $image)
							<img class="checkout-thumbnail" src="{{ $image->getUrl('thumb') }}" data-full="{{ $image->getUrl() }}" style="height: 30px; width: auto;"/>
						@endforeach
					</td>
					<td>
						{{ $equipment1->group }}
					</td>
					<td>
						{{ $equipment1->equipment_type->display_name }}
					</td>
					<td>
						{{ $equipment1->item }}
					</td>
					<td>
						{{ $equipment1->barcode }}
					</td>
				</tr>
			@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5">
						{{ $equipment->links()  }}
					</td>
				</tr>
			</tfoot>
		</table>



	</div>
@endif


@endsection