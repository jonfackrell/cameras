@extends('3d.layouts.admin')

@section('content')

	{!! BootForm::open()->action(route('3d.page.update', $page))->put() !!}
	  {!! BootForm::bind($page) !!}
	  {!! BootForm::text('Name', 'name')->required() !!}
	  {!! BootForm::text('Slug', 'slug')->required() !!}
	  {!! BootForm::textarea('Content', 'content')->addClass('summernote')->required() !!}
	  
	  {!! BootForm::submit('Submit') !!}
	{!! BootForm::close() !!} 

@endsection

@push('styles')
	<link rel="stylesheet" href="/printing/css/jquery-sortable.css" />
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
				height: 800
			});
		});
	</script>
@endpush