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

        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('articles.index') }}">Cancel</a>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            @role('super.admin')
                <a class="btn btn-danger" href="{{ route('articles.delete', $article->slug) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection