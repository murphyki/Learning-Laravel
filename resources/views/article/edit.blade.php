@extends('app')

@section('title', 'Edit Article Details')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Edit Article Details</h1>

    @include('errors.errors')

    {!! Form::model($article, ['method' => 'PUT', 'route' => ['articles.update', $article->slug]]) !!}
        @include('article.partial.form')
        @include('article.partial.buttons', [
            'submitText' => 'Update',
            'btnClass' => 'btn-primary',
            'slug' => $article->slug
        ])
    {!! Form::close() !!}
@endsection