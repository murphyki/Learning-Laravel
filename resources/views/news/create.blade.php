@extends('app')

@section('title', 'Create News Article')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Create News Article</h1>
    <hr/>

    @include('errors.errors')

    {!! Form::open(['route' => 'news.store']) !!}
        @include('news.partial.form', [
            'publishedAt' => date('Y-m-d')
        ])
        @include('news.partial.buttons', [
            'submitText' => 'Create',
            'btnClass' => 'btn-primary'
        ])
    {!! Form::close() !!}
@endsection