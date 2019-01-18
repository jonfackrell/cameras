<div class="row">
	<div class="col">
		{!! BootForm::select('Pen', 'pen_id')->options(([null => '-- Select One--'] + $tabletPens->all()), []) !!}
	</div>
	<div class="col">
		{!! BootForm::checkbox("", "tablet_pen")->value(true)->checked() !!}
	</div>
</div>