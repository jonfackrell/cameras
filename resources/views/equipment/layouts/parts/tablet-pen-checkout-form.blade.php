<div class="row">
	<div class="col">
		{!! BootForm::select('Tablet', 'tablet_id')->options(array_merge([null => '-- Select One--'], $tablets->all()), []) !!}
	</div>
	<div class="col">
		{!! BootForm::checkbox("", "tablet")->value(true)->checked() !!}
	</div>
</div>