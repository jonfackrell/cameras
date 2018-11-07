@extends('equipment.layouts.patron')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection


@section('content')
	<div>Welcome {{ $patron->getFullNameAttribute() }}</div>
@endsection