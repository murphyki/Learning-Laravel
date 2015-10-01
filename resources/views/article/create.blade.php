@extends('app')

@section('title', 'Create Article')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Create Article</h1>
    <hr/>

    @include('errors.errors')

    {!! Form::open(['route' => 'articles.store']) !!}
        @include('article.partial.form', [
            'publishedAt' => date('Y-m-d')
        ])
        @include('article.partial.buttons', [
            'submitText' => 'Create',
            'btnClass' => 'btn-primary'
        ])
    {!! Form::close() !!}
@endsection