@extends('equipment.layouts.patron')

@section('title')
    Terms and Conditions
@endsection

@section('content')
	<h2>Terms and Conditions</h2>

	@if (!auth()->guard('patrons')->user()->areTermsAgreed())
		<p>Please read and agree to all of the following terms and conditions. Terms and conditions apply to all renters (students and employees). This agreement will be valid until {{ $date->tz('America/Denver')->format('M d Y') }}. </p>
	@else
		<p>This agreement will need to be renued after {{ $date->tz('America/Denver')->format('M d Y') }}. </p>
	@endif

	<h4>Camera Equipment</h4>

	<ul class="bullets">
		<li>You are responsible for any repair / replacement if any items you checkout are damaged.</li>

		<li>You can only check out and return equipment for yourself.</li>

		<li>A fee of $10 per day will be charged to your acount for any late items.</li>
	</ul>

	<h4>Other Equipment</h4>

	<ul class="bullets">
		<li>The equipment must stay in the library at all times.</li> 

		<li>The equimpent may be on any floor in the library. This exclude any tablets and their pens.</li>

		<li>All tablets and pens must stay in the Mac Lab.</li>

		<li>The equipment is due back 15 minutes before the library closes.</li>
	</ul>
	@if (!auth()->guard('patrons')->user()->areTermsAgreed())
	{!! BootForm::open()->post()->action(route('equipment.patron.terms')) !!}
	{!! BootForm::submit('I AGREE') !!}
	{!! BootForm::close() !!}
	@endif
@endsection