@extends('equipment.layouts.patron')

@section('title')
    Terms and Conditions
@endsection

@section('breadcrumbs')
	<a href="{{ route('maclab.home') }}">MAC LAB</a>
	/
	<a href="{{ route('equipment.home') }}">EQUIPMENT</a>
	/
	<span> TERMS & CONDITIONS</span>
@endsection

@section('content')

	<div class="clear-fix">&nbsp;</div>

	<div class="row">
		<div class="col-md-12">
			<h2 style="border-bottom: 2px solid #A5216F; font-size: 20px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
				TERMS & CONDITIONS
			</h2>
		</div>
	</div>
	<div class="clearfix">&nbsp;</div>

	@if (!auth()->guard('patrons')->user()->areTermsAgreed())
		<p>Please read and agree to all of the following terms and conditions. Terms and conditions apply to all patrons (students and employees). This agreement will be valid until <strong>{{ $date->tz('America/Denver')->format('M d Y') }}</strong>. </p>
	@else
		<p>This agreement will need to be renewed after <strong>{{ $date->tz('America/Denver')->format('M d Y') }}</strong>. </p>
	@endif

	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-md-12">
			<h2 style="font-size: 18px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
				CAMERA EQUIPMENT
			</h2>
		</div>
	</div>

	<ul class="bullets">
		<li>Equipment is for academic use only.</li>

		<li>You are responsible for any repair / replacement if any items you checkout are damaged.</li>

		<li>You can only check out and return equipment for yourself.</li>

		<li>A fee of $10 per day will be charged to your acount for any late items.</li>
	</ul>

	<div class="clearfix">&nbsp;</div>
	<div class="row">
		<div class="col-md-12">
			<h2 style="font-size: 18px; font-family: 'Oswald', sans-serif; letter-spacing: 1.5px;">
				OTHER EQUIPMENT
			</h2>
		</div>
	</div>

	<ul class="bullets">
		<li>The equipment must stay in the Library at all times.</li> 

		<li>The equimpent may be on any floor in the Library. This exclude any tablets and their pens.</li>

		<li>All tablets and pens must stay in the Mac Lab.</li>

		<li>The equipment is due back 15 minutes before the Library closes.</li>
	</ul>
	@if (!auth()->guard('patrons')->user()->areTermsAgreed())
	{!! BootForm::open()->post()->action(route('equipment.patron.terms')) !!}
	{!! BootForm::submit('I AGREE') !!}
	{!! BootForm::close() !!}
	@endif
@endsection