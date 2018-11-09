<!-- header -->

<div class="row justify-content-end light" style="text-align: right;">
	<div class="col-md-4">Welcome, {{ auth()->guard('web')->user()->first_name }}</div>
	<div class="col-md-2">
		{!! BootForm::open()->action(route('logout'))->post() !!}
        {!! BootForm::submit('Logout')->class('btn warning') !!}
        {!! BootForm::close() !!}
	</div>
</div>

<!-- /header -->