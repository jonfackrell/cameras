<div class="row">
	@if (sizeof($powerSupplies) < 1)
		<div class="col disable"><label>Power Supply</label></div> 
		<div class="col">
			{!! BootForm::checkbox("", "power")->value(true)->disable() !!}
		</div>
	@else
		<div class="col"><label>Power Supply</label></div> 
		<div class="col">
			{!! BootForm::checkbox("", "power")->value(true) !!}
		</div>
	@endif
</div>
<div class="row">
	<div class="col">
		{!! BootForm::select('Memory Card', 'size')->options($memory, []) !!}
	</div>
	<div class="col">
		{!! BootForm::checkbox("", "memory")->value(true) !!}
	</div>
</div>
<div class="row">
	@if (sizeof($batteries) < 1)
		<div class="col disable"><label>Battery</label></div> 
		<div class="col">
			{!! BootForm::checkbox("", "battery-ex")->value(true)->disable() !!}
		</div>
	@else
		<div class="col"><label>Battery</label></div> 
		<div class="col">
			{!! BootForm::checkbox("", "battery-ex")->value(true) !!}
		</div>
	@endif
</div>
<div class="row">
	@if (sizeof($batteries) < 2)
		<div class="col disable"><label>Extra Battery</label></div> 
		<div class="col">
			{!! BootForm::checkbox("", "battery-ex")->value(true)->disable() !!}
		</div>
	@else
		<div class="col"><label>Extra Battery</label></div> 
		<div class="col">
			{!! BootForm::checkbox("", "battery-ex")->value(true) !!}
		</div>
	@endif
</div>
<div class="row">
	<div class="col"><label>USB Cable</label></div> 
	<div class="col">
		{!! BootForm::checkbox("", "usb")->value(true) !!}
	</div>
</div>
<div class="row">
	<div class="col">
		{!! BootForm::select('Tripod', 'tripod')->options($tripods->pluck('item', 'id'), []) !!}
	</div>
	<div class="col">
		{!! BootForm::checkbox("", "tripods")->value(true) !!}
	</div>
</div>
@include('equipment.layouts.parts.tripod-checkout-form')