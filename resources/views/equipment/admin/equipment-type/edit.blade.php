@extends('equipment.layouts.admin')

@section('title')
    Edit Equipment Type
@endsection

@section('content')
	<div class="col-lg-12 mt-2 mb-2">
		
		{!! BootForm::open()->post()->action(route('equipment.admin.equipment-type.edit', ['equipmentType' => $equipmentType->id]))->enctype("multipart/form-data") !!}
		<div class="row"> 
			
			<div class="col-3"> 
				{!! BootForm::text('Type', 'type')->value($equipmentType->type) !!}
			</div>
			<div class="col-2"> 
				{!! BootForm::select('Group', 'group')->options(['camera' => 'Camera', 'other' => 'Other'])->select($equipmentType->group) !!}
			</div>
			<div class="col-3"> 
				{!! BootForm::text('Display Name', 'display_name')->value($equipmentType->display_name) !!}
			</div>
			<div class="col-2">
				<div class="row">
					<label class="col-12">Faculty Only</label>
				</div> 
				<div class="row">
					@if ($equipmentType->faculty_only)
					{!! BootForm::checkbox("&nbsp;", "faculty_only")->check() !!}
					@else
					{!! BootForm::checkbox("&nbsp;", "faculty_only") !!}
					@endif
				</div>
			</div>
			<div class="col-2"> 
				<div class="row">
					<label class="col-12">Duplicable</label>
				</div> 
				<div class="row">
					@if ($equipmentType->duplicable)
					{!! BootForm::checkbox("&nbsp;", "duplicable")->check() !!}
					@else
					{!! BootForm::checkbox("&nbsp;", "duplicable") !!}
					@endif
				</div>
			</div>


		</div>
		<div class="row">
			<div class="col-4">
				{!! BootForm::select('Loan Type', 'loan_type')
								->options([
									null => '-- Select One--',
									'CAMERA' => 'Camera',
									'DAILY' => 'Due End-of-Day',
									'CUSTOM' => 'Determined by Equipment Type',
								])
								->select($equipmentType->loan_type)
								->required()
				!!}
			</div>
			<div class="col-4">
				{!! BootForm::text('Loan Period', 'loan_period')->value($equipmentType->loan_period)->helpBlock('Should be input as hours') !!}
			</div>
			<div class="col-4">
				{!! BootForm::text('Fine Amount', 'fine_amount')->value($equipmentType->fine_amount)->helpBlock('Should be input as cents') !!}
			</div>
		</div>
		<div class="row">

			<div class="col-12">
				{!! BootForm::textarea('Description', 'description')->value($equipmentType->description)->addClass('summernote') !!}
			</div>
		</div>
		<div class="row" style="margin: 10px -15px 15px;">
			<div class="col">
				<label class="control-label" for="file">Image</label>
				<input type="file" name="file[]" id="file" accept="image/*"/>
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

@push('styles')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endpush

@push('footer-scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
	<script>
		$('.summernote').summernote({
			tabsize: 2,
			height: 300
		});
	</script>
@endpush