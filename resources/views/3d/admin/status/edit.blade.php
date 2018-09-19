@extends('3d.layouts.admin')

@section('title')
    Statuses
@endsection

@section('content')

	{!! BootForm::open()->action(route('3d.status.update', $status))->put() !!}
	  {!! BootForm::bind($status) !!}
	  {!! BootForm::text('Name', 'name') !!}
	  {!! BootForm::submit('Submit') !!}
	  
	{!! BootForm::close() !!} 

@endsection