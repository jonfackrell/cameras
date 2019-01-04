@extends('equipment.layouts.admin')

@section('title')
    Edit Equipment Type
@endsection

@section('content')
	<div class="col-lg-12 mt-2 mb-2">
		
		{!! BootForm::open()->post()->action(route('equipment.admin.equipment-type.edit', ['equipmentType' => $equipmentType->id])) !!}
		<div class="row"> 
			
			<div class="col-3"> 
				{!! BootForm::text('Type', 'type')->value($equipmentType->type) !!}
			</div>
			<div class="col-2"> 
				{!! BootForm::select('Group', 'group')->options(['camera' => 'Camera', 'other' => 'Other'])->value($equipmentType->group) !!}
			</div>
			<div class="col-3"> 
				{!! BootForm::text('Display Name', 'display_name')->value($equipmentType->display_name) !!}
			</div>
			<div class="col-2">
				<div class="row">
					<label class="col-12">Faculty Only</label>
				</div> 
				<div class="row">
					{!! BootForm::checkbox("&nbsp;", "faculty_only") !!}
				</div>
			</div>
			<div class="col-2"> 
				<div class="row">
					<label class="col-12">Duplicable</label>
				</div> 
				<div class="row">
					{!! BootForm::checkbox("&nbsp;", "duplicable") !!}
				</div>
			</div>


		</div>
		<div class="row">
			<div class="col-4">
				{!! BootForm::submit('Save') !!}
			</div>
		</div>
		{!! BootForm::close() !!}

	</div>
	
@endsection