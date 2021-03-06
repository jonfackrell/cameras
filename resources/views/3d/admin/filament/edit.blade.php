@extends('3d.layouts.admin')

@section('title')
    Filaments
@endsection

@section('content')

	{!! BootForm::open()->action(route('3d.filament.update', $filament))->put() !!}
	    {!! BootForm::bind($filament) !!}
	    {!! BootForm::text('Name', 'name') !!}
    {!! BootForm::textarea('Description', 'description')->addClass('summernote') !!}
	    {!! BootForm::submit('Submit') !!}
	{!! BootForm::close() !!} 

@endsection

@push('styles')
    <link rel="stylesheet" href="/printing/css/summernote.css" />
    <style>
        .note-group-select-from-files{display: none;}
    </style>
@endpush

@push('custom-scripts')
    <script src="/printing/js/summernote.js"></script>
    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.summernote').summernote({
                height: 200
            });

        });
    </script>
@endpush