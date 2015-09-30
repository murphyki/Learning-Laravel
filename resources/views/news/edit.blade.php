@extends('app')

@section('title', 'Edit News Article Details')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Edit News Article Details</h1>

    @include('errors.errors')

    {!! Form::model($news, ['method' => 'PUT', 'route' => ['news.update', $news->slug]]) !!}
        @include('news.partial.form', [
            'publishedAt' => date('Y-m-d', strtotime($news->published_at))
        ])
        @include('news.partial.buttons', [
            'submitText' => 'Update',
            'btnClass' => 'btn-primary',
            'slug' => $news->slug
        ])
    {!! Form::close() !!}
@endsection