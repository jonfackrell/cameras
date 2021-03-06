@extends('3d.layouts.admin')

@section('title')
    Users
@endsection

@section('content')

    @if(auth()->guard('web')->user()->isSuperUser() || auth()->guard('web')->user()->can('create-users'))
        {!! BootForm::open()->action(route('3d.user.index'))->post() !!}
              {!! BootForm::text('First Name', 'first_name') !!}
              {!! BootForm::text('Last Name', 'last_name') !!}
              {!! BootForm::email('Email', 'email') !!}
              {!! BootForm::select('Role', 'role')->options($roles) !!}
              {!! BootForm::submit('Submit') !!}
        {!! BootForm::close() !!}
    @endif

    @if($users->count() > 0)
        <table class="table table-striped sorted_table">
            <thead>
                <tr>
                    <td></td>
                    <td>Role</td>
                    <td>Created</td>
                    <td>Updated</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr data-id="{{ $user->id }}">
                    <th>
                        <a href="{{ route('3d.user.edit', ['user' => $user]) }}">{{ $user->first_name }} {{ $user->last_name }}</a>
                    </th>
                    <td>
                        {{ $user->role->label ?? '' }}
                    </td>
                    <td>
                        {{ $user->created_at->toDayDateTimeString() }}
                    </td>
                    <td>
                        {{ $user->updated_at->toDayDateTimeString() }}
                    </td>
                    <td>
                        @if(auth()->guard('web')->user()->isSuperUser() || auth()->guard('web')->user()->can('delete-users'))
                            {!! BootForm::open()->action(route('3d.user.destroy', $user->id))->delete() !!}
                            {!! BootForm::submit('Delete', 'delete')->class('btn btn-danger btn-xs delete') !!}
                            {!! BootForm::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
    @else
        <div class="alert alert-danger" style="margin-top: 10px;">
            <p>
                You currently do not have any Users setup in your system.
            </p>
        </div>
    @endif

@endsection
