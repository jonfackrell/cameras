<div class="row">
	<div class="col">
		{!! BootForm::select('Tablet', 'tablet_id')->options(([null => '-- Select One--'] + $tablets->all()), []) !!}
	</div>
	<div class="col">
		{!! BootForm::checkbox("", "tablet")->value(true)->checked() !!}
	</div>
</div>