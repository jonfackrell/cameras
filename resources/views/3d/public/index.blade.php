@extends('3d.layouts.public')

@section('title')
    {{ $page->name }}
@endsection

@section('content')

    {!! $page->content !!}

@endsection