@extends('equipment.layouts.admin')

@section('title')
    {{ $patron->getFullNameAttribute() }}
@endsection

@section('content')
	{!! BootForm::open()->post()->action(route('equipment.admin.patron.show', $patron->id)) !!}
	{!! BootForm::text('&nbsp', 'search')->placeholder('item or barcode') !!}
	{!! BootForm::close() !!}
@endsection