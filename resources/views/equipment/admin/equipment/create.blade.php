@extends('equipment.layouts.admin')

@section('title')
    Add Equipment
@endsection

@section('content')

	<div class="col-12">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="single-tab" data-toggle="tab" href="#single" role="tab" aria-controls="single" aria-selected="true">Single Item</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="multiple-tab" data-toggle="tab" href="#multiple" role="tab" aria-controls="multiple" aria-selected="false">Multiple Items</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent" style="padding-top: 12px;">

			<div class="tab-pane fade show active" id="single" role="tabpanel" aria-labelledby="single-tab">
				{!! BootForm::open()->post()->action(route('equipment.admin.equipment.create')) !!}
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
				{!! BootForm::submit('Add Equipment') !!}
				{!! BootForm::close() !!}
			</div>
			<div class="tab-pane fade" id="multiple" role="tabpanel" aria-labelledby="multiple-tab">
				{!! BootForm::open()->post()->action(route('equipment.admin.equipment.multiply')) !!}
				{!! BootForm::select('Multiplier', 'multiplier')->options([5=>'5', 10=>'10']) !!}
				{!! BootForm::select('Group', 'group_multi')->options([
						null => '-- Select One--',
						'camera' => 'Camera',
						'other' => 'Other'
					])->required() !!}
				{!! BootForm::select('Type', 'type_multi')->options([
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
				{!! BootForm::text('Description', 'description_multi') !!}
				{!! BootForm::submit('Add Equipment') !!}
				{!! BootForm::close() !!}
			</div>

		</div>
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
			for (i = 0; i < equipmentTypesDuplicable.other.length; i++) {
				var opts = '<option value="' + equipmentTypesDuplicable.other[i].id + '">' + equipmentTypesDuplicable.other[i].display_name + '</option>';
				type.append(opts);
			}
		}
	}


	fillType();
	fillTypeMultiply()

	$('#group').change(fillType);
	$('#group_multi').change(fillTypeMultiply);
</script>
@endpush