@extends('layouts.public')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('breadcrumbs')
    <span> PROFILE</span>
@endsection


@section('content')
	<div>Welcome {{ $patron->getFullNameAttribute() }}</div>
@endsection