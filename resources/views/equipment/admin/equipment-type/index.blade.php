@extends('equipment.layouts.admin')

@section('title')
    Equipment Types
@endsection

@section('content')
	<div class="col-lg-8 list-group mt-2 mb-2">
		<div class="row list-group-item header">
			<div class="col-4">
				<h3>Type</h3>
			</div>
			<div class="col-4">
				<h3>Group</h3>
			</div>
			<div class="col-4">
				<h3>Display Name</h3>
			</div>
		</div>

		@foreach ($equipmentTypes as $equipmentType)
			<a class="row list-group-item" href="{{ route('equipment.admin.equipment-type.edit', ['checkout' => $equipmentType->id]) }}">
				<div class="col-4">
					{{ $equipmentType->type }}
				</div>
				<div class="col-4">
					{{ $equipmentType->group }}
				</div>
				<div class="col-4">
					{{ $equipmentType->display_name }}
				</div>
			</a>
		@endforeach

		<div class="row list-group-item">
			<div class="col-1 btn btn-default ml-3" id="add">+</div>
			<div class="col-12" id="form">
				
				{!! BootForm::open()->post()->action(route('equipment.admin.equipment-type.create')) !!}
				<div class="row"> 
					
					<div class="col-4"> 
						{!! BootForm::text('Type', 'type') !!}
					</div>
					<div class="col-4"> 
						{!! BootForm::select('Group', 'group')->options(['camera' => 'Camera', 'other' => 'Other']) !!}
					</div>
					<div class="col-4"> 
						{!! BootForm::text('Display Name', 'display_name') !!}
					</div>
					
				</div>
				<div class="row">
					<div class="col-4">
						{!! BootForm::submit('Add Equipment Type') !!}
					</div>
				</div>
				{!! BootForm::close() !!}
				
			</div>
		</div>
	</div>
	
@endsection

@push('footer-scripts')
<script type="text/javascript">
	$('#add').click(function() {
		$(this).hide();
		$('#form').show();
		$('#type').focus();
	});
</script>
@endpush

@push('styles')
<style type="text/css">
	#form { display: none; }
</style>
@endpush