@extends('app')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>

    @role('super.admin')
        {!! Form::model($article) !!}
            <div class="btn-group btn-group-lg">
                <a class="btn btn-info" href="{{ route('article.index') }}">Cancel</a>
                <a class="btn btn-primary" href="{{ route('article.edit', $article->slug) }}">Edit</a>
                <a class="btn btn-danger" href="{{ route('article.delete', $article->slug) }}">Delete</a>
            </div>
        {!! Form::close() !!}
    @endrole
@endsection