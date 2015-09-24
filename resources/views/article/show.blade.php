@extends('app')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>

    <div>{!! $article->content !!}</div>

    @role('admin')
        {!! Form::model($article) !!}
            <div class="btn-group btn-group-lg">
                <a class="btn btn-info" href="{{ route('articles.index') }}">Cancel</a>
                <a class="btn btn-primary" href="{{ route('articles.edit', $article->slug) }}">Edit</a>
                @role('super.admin')
                    <a class="btn btn-danger" href="{{ route('articles.delete', $article->slug) }}">Delete</a>
                @endrole
            </div>
        {!! Form::close() !!}
    @endrole
@endsection