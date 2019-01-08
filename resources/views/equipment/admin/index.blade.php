@extends('equipment.layouts.admin')

@section('title')
    Search Patrons
@endsection

@section('banner')
	@include('equipment.layouts.parts.stats-banner')
@endsection

@section('content')
	<div id="patron_search" class="col-lg-12">
        
		{!! BootForm::open()->post()->action(route('equipment.admin')) !!}
		<div class="row">
			<div class="col-md-6">
				{!! BootForm::text('', 'search')->placeholder('First name, Last name, or I-Number')->value(request()->get('search'))->autofocus() !!}
			</div>
		</div>
		{!! BootForm::close() !!}
	</div>
    <div class="clearfix">&nbsp;</div>
    @if (!empty($message))
        <p>{{ $message }}</p>
    @endif
    <div class="clearfix">&nbsp;</div>
    <div class="clearfix">&nbsp;</div>

    @if(isset($patrons) && $patrons->count() > 0)
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">I-Number</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($patrons as $patron)
                <tr onclick="javascript: location.href = '{{ route('equipment.admin.patron.show', $patron->id) }}';">
                    <td>
                        {{ $patron->getFullNameAttribute() }}
                    </td>
                    <td>
                        {{ $patron->inumber }}
                    </td>
                    <td>
                        {{ $patron->email }}
                    </td>
                    <td>
                        {{ $patron->getRole() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">

                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    @endif
    <div class="col-md-12">
@endsection

@push('styles')
    <style>
        table.table tr{cursor:pointer;}
    </style>
@endpush
