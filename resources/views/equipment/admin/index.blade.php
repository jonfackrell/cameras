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
				{!! BootForm::text('', 'search')->placeholder('First name, Last name, I-Number or Item')->value(request()->get('search'))->autofocus() !!}
			</div>
		</div>
		{!! BootForm::close() !!}
	</div>

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
                @if(request()->has('equipment_group'))
                    <tr onclick="javascript: location.href = '{{ route('equipment.admin.patron.show', $patron->id) }}';">
                        <th>
                            &nbsp;&nbsp;&nbsp;&nbsp;Items Checked Out:
                        </th>
                        <td colspan="3">
                            @foreach ($patron->current as $pequipment)
                                @if(strlen($pequipment->equipment->item) > 1)
                                    <span class=" btn btn-default btn-sm equipment">{{ $pequipment->equipment->item }}</span>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5">

                </td>
            </tr>
            </tfoot>
        </table>

    @else

        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <div class="col-md-12">
            {!! BootForm::open()->post()->action(route('equipment.admin.email.terms')) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! BootForm::email('Email Link to Terms', 'email')->required() !!}
                    </div>
                    <div class="col-md-1">
                        <label class="control-label">&nbsp;</label>
                        {!! BootForm::submit('Send') !!}
                    </div>
                </div>
            {!! BootForm::close() !!}
        </div>

    @endif

@endsection

@push('styles')
    <style>
        table.table tr{cursor:pointer;}
    </style>
@endpush

@push('footer-scripts')
    <script type="text/javascript">
        $(function () {

            $(document).on('click', 'button[type="submit"]', function(){
                $(this).prop('disabled', true);
                $(this).closest('form').submit();
            });

        });
    </script>
@endpush