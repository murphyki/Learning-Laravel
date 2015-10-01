@extends('app')

@section('title', 'Edit Article Details')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Edit Article Details</h1>
    <hr/>

    @include('errors.errors')

    {!! Form::model($article, ['method' => 'PUT', 'route' => ['articles.update', $article->slug]]) !!}
        @include('article.partial.form', [
            'publishedAt' => date('Y-m-d', strtotime($article->published_at))
        ])
        @include('article.partial.buttons', [
            'submitText' => 'Update',
            'btnClass' => 'btn-primary',
            'slug' => $article->slug
        ])
    {!! Form::close() !!}
@endsection