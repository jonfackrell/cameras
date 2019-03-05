@extends('3d.layouts.admin')

@section('title')
    Pages
@endsection


@section('content')

    @if(auth()->guard('web')->user()->isSuperUser() || auth()->guard('web')->user()->can('create-pages'))
        {!! BootForm::open()->action(route('3d.page.index'))->post() !!}
        {!! BootForm::text('Name', 'name')->required() !!}
        {!! BootForm::text('Slug', 'slug')->required() !!}
        {!! BootForm::submit('Submit') !!}
        {!! BootForm::close() !!}
    @endif

    @if($pages->count() > 0)
        <table class="table table-striped sorted_table">
            <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr data-id="{{ $page->id }}">
                    <th>
                        <a href="{{ route('3d.page.edit', ['page' => $page]) }}">{{ $page->name }}</a>
                    </th>
                    <td>
                        @if(auth()->guard('web')->user()->isSuperUser() || auth()->guard('web')->user()->can('delete-page'))
                            {!! BootForm::open()->action(route('3d.page.destroy', $page->id))->delete() !!}
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
                You currently do not have any Pages setup in your system.
            </p>
        </div>
    @endif

@endsection

@push('styles')
    <link rel="stylesheet" href="/printing/css/jquery-sortable.css" />
@endpush

@push('custom-scripts')
    <!-- Bootstrap Colorpicker -->
    <script src="/printing/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $(function() {
            $('#cp2').colorpicker();
        });
    </script>
    <script src="/printing/js/jquery-sortable.min.js"></script>
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var $table = $('.sorted_table').sortable({
                containerSelector: 'table',
                itemPath: '> tbody',
                itemSelector: 'tr',
                delay: 100,
                placeholder: '<tr class="placeholder"/>',
                onDrop: function  ($item, container, _super) {
                    var data = $table.sortable("serialize").get();

                    var jsonString = JSON.stringify(data, null, ' ');

                    _super($item, container);
                    $.ajax({
                        type: "POST",
                        url: '{{ route('3d.color.sort') }}',
                        data: {'order': jsonString},
                        dataType: "json",
                        success: function (data) {

                        },
                        error: function (data) {

                        }
                    });
                }
            });
        });
    </script>
@endpush