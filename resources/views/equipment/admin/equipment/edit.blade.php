@extends('equipment.layouts.admin')

@section('title')
    Edit Equipment
@endsection

@section('content')

	<div class="col-12">
		{!! BootForm::open()->put()->action(route('equipment.admin.equipment.update', ['equipment' => $equipment]))->enctype("multipart/form-data") !!}
		@php
			BootForm::bind($equipment);
		@endphp
		{!! BootForm::text('Item', 'item')->placeholder('only if applicable') !!}
		{!! BootForm::text('Barcode', 'barcode')->placeholder('only if applicable') !!}
		{!! BootForm::select('Group', 'group')->options([
                null => '-- Select One--',
                'camera' => 'Camera',
                'other' => 'Other'
            ])->required() !!}
		{!! BootForm::select('Type', 'type')->options([
                null => '-- Select One--',
                'ditigal-cam' => 'DC Camera',
                'ditigal-bat' => 'DC Battery',
                'video-cam' => 'DVC Camera',
                'video-bat' => 'DVC Battery',
                'dslr-cam' => 'DSLR Camera',
                'dslr-bat' => 'DSLR Battery',
                'memory' => 'SD Card',
                'usb' => 'USB Cable',
                'tripod' => 'Tripod',
                'tripod-head' => 'Tripod Head',
                'tripod-hand' => 'Tripod Handle'
            ])->required() !!}
		{!! BootForm::text('Description', 'description') !!}
		<div class="row" style="margin: 10px -15px 15px;">
			<div class="col">
				<label class="control-label" for="file">Image</label>
				<input type="file" name="file[]" id="file" accept="image/*"/>
			</div>
		</div>
		{!! BootForm::submit('Add Equipment') !!}
		{!! BootForm::close() !!}
	</div>

@endsection

@push('footer-scripts')
<script type="text/javascript">
	var camopts = [['ditigal-cam', 'DC Camera'], ['ditigal-bat', 'DC Battery'], 
				   ['video-cam', 'DVC Camera'], ['video-bat', 'DVC Battery'], 
				   ['dslr-cam', 'DSLR Camera'], ['dslr-bat', 'DSLR Battery'], 
				   ['memory', 'SD Card'], ['usb', 'USB Cable'], 
				   ['tripod', 'Tripod'], ['tripod-head', 'Tripod Head'], 
				   ['tripod-hand', 'Tripod Handle']];

	var otheropts = [['headphone', 'Headphone'], ['card-reader', 'Card Reader'], 
				   ['hdmi', 'HDMI'], ['tablet-sm', 'Tablet, Small'], 
				   ['tablet-lg', 'Tablet, Large'], ['pen', 'Tablet, Pen']];

	var equipmentTypes = {!! $equipmentTypes->toJson() !!};

	var equipmentTypesDuplicable = {!! $equipmentTypesDuplicable->toJson() !!};


	function fillType() {
		var group = $('#group option:selected').val();
		var type = $('#type');
		type.empty();

		if (group == 'camera') {
			for (i = 0; i < equipmentTypes.camera.length; i++) {
				var opts = '<option value="' + equipmentTypes.camera[i].id + '">' + equipmentTypes.camera[i].display_name + '</option>';
				type.append(opts);
			}
		}
		else {
			for (i = 0; i < equipmentTypes.other.length; i++) {
				var opts = '<option value="' + equipmentTypes.other[i].id + '">' + equipmentTypes.other[i].display_name + '</option>';
				type.append(opts);
			}
		}
	}


	function fillTypeMultiply() {
		var group = $('#group_multi option:selected').val();
		var type = $('#type_multi');
		type.empty();

		if (group == 'camera') {
			for (i = 0; i < equipmentTypesDuplicable.camera.length; i++) {
				var opts = '<option value="' + equipmentTypesDuplicable.camera[i].id + '">' + equipmentTypesDuplicable.camera[i].display_name + '</option>';
				type.append(opts);
			}
		}
		else {
		    if(equipmentTypesDuplicable.hasOwnProperty('other')){
                for (i = 0; i < equipmentTypesDuplicable.other.length; i++) {
                    var opts = '<option value="' + equipmentTypesDuplicable.other[i].id + '">' + equipmentTypesDuplicable.other[i].display_name + '</option>';
                    type.append(opts);
                }
            }
		}
	}


	fillType();
	fillTypeMultiply()

	$('#group').change(fillType);
	$('#group_multi').change(fillTypeMultiply);
</script>
@endpush