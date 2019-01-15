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

		<li>Camera equipment is for academic use only.</li>

		<li>You are responsible for any repair / replacement of any items that are damaged while checked out to you.</li>

		<li>You can only check out and return equipment for yourself.</li>

		<li>A fee of $10 per day will be charged to your account for any late items.</li>

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

		<li>You are responsible for any repair / replacement of any items that are damaged while checked out to you.</li>

		<li>Tablets and tablet pens must remain in the Mac Lab.</li>

		<li>Headphones should remain in the McKay Library.</li>

		<li>Other equipment such as cricuts, projectors, adapters, and microphones can be taken out of the library.</li>

		<li>All equipment should be returned at least 15 minutes prior to the library closing to allow sufficient time to get it checked back in.</li>

		<li>To view loan periods and late fees, please refer to the item's information page (see the list of <a href="{{ url(route('equipment.home')) }}">Available Equipment</a>)</li>

	</ul>
	@if (!auth()->guard('patrons')->user()->areTermsAgreed())
	{!! BootForm::open()->post()->action(route('equipment.patron.terms')) !!}
	{!! BootForm::submit('I AGREE') !!}
	{!! BootForm::close() !!}
	@endif
@endsection