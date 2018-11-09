@extends('equipment.layouts.patron')

@section('title')
    Terms and Conditions
@endsection

@section('content')
	<h2>Terms and Conditions</h2>

	<p>Please read and agree to all of the following terms and conditions. Terms and conditions apply to all renters (students and employees). This agreement will be valid until {{ $date->tz('America/Denver')->format('M d Y') }}. </p>

	<h4>Camera Equipment</h4>

	<p>You are responsible for any repair / replacement if any items you checkout are damaged.</p>

	<p>You can only check out and return equipment for yourself.</p>

	<p>A fee of $10 per day will be charged to your acount for any late items.</p>

	<h4>In-house Equipment</h4>

	<p>The equipment must stay in the library at all times.</p> 

	<p>The equimpent may be on any floor in the library. This exclude any tablets and their pens.</p>

	<p>All tablets and pens must stay in the Mac Lab.</p>

	<p>The equipment is due back 15 minutes before the library closes.</p>

	{!! BootForm::open()->post()->action(route('equipment.patron.terms')) !!}
	{!! BootForm::submit('I AGREE') !!}
	{!! BootForm::close() !!}
@endsection