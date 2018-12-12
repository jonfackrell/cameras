@extends('3d.layouts.admin')

@section('title')
    Users
@endsection

@section('content')
    {!! BootForm::open()->action(route('3d.user.update', $user))->put() !!}
    {!! BootForm::bind($user) !!}
    {!! BootForm::text('First Name', 'first_name')->required() !!}
    {!! BootForm::text('Last Name', 'last_name')->required() !!}
    {!! BootForm::email('Email', 'email') !!}

    @if(isset($user->role->name))
        {!! BootForm::select('Role', 'role')->options($roles)->select($user->role->name) !!}
    @else
        {!! BootForm::select('Role', 'role')->options($roles) !!}
    @endif


    {!! BootForm::select('Department', 'department')->options($departments) !!}

    {!! BootForm::checkbox('Should Receive Daily Equipment Email', 'send_equipment_notice_email') !!}

    {!! BootForm::submit('Submit') !!}

    {!! BootForm::close() !!}

@endsection