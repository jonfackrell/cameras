@extends('equipment.layouts.admin')

@section('title')
    Add Equipment
@endsection

@section('content')
	<div class="col-12">
		{!! BootForm::open()->post()->action(route('equipment.admin.equipment.create')) !!}
		{!! BootForm::text('Item', 'item')->placeholder('only if applicable') !!}
		{!! BootForm::text('Barcode', 'barcode')->placeholder('only if applicable') !!}
		{!! BootForm::select('Group', 'group')->options(['camera'=>'Camera', 'other'=>'Other']) !!}
		{!! BootForm::select('Type', 'type')->options(['ditigal-cam'=>'DC Camera', 'ditigal-bat'=>'DC Battery', 'video-cam'=>'DVC Camera', 'video-bat'=>'DVC Battery', 'dslr-cam'=>'DSLR Camera', 'dslr-bat'=>'DSLR Battery', 'memory'=>'SD Card', 'usb'=>'USB Cable', 'tripod'=>'Tripod', 'tripod-head'=>'Tripod Head', 'tripod-hand'=>'Tripod Handle']) !!}
		{!! BootForm::text('Description', 'description') !!}
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


	function fillType() {
		var group = $('#group option:selected').val();
		var type = $('#type');
		type.empty();

		if (group == 'camera') {
			for (i = 0; i < equipmentTypes.camera.length; i++) {
				var opts = '<option value="' + equipmentTypes.camera[i].type + '">' + equipmentTypes.camera[i].display_name + '</option>';
				type.append(opts);
			}
		}
		else {
			for (i = 0; i < equipmentTypes.other.length; i++) {
				var opts = '<option value="' + equipmentTypes.other[i].type + '">' + equipmentTypes.other[i].display_name + '</option>';
				type.append(opts);
			}
		}
	}

	fillType();

	$('#group').change(fillType);
</script>
@endpush