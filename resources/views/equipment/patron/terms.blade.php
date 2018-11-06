@extends('layouts.public')

@section('title')
    Terms and Conditions
@endsection

@section('breadcrumbs')
    <span> TERMS AND CONDITIONS</span>
@endsection


@section('content')
	<h3>Terms and Conditions</h3>

	{!! BootForm::open()->post()->action(route('equipment.patron.terms')) !!}
	{!! BootForm::submit('I AGREE') !!}
	{!! BootForm::close() !!}
@endsection