@extends('app')

@section('title', 'Delete Article')

@section('content')
    <h1>Delete Article</h1>
    <hr/>

    <div class="alert alert-danger">
        <p>Are you really sure you want to delete '{{ $article->title }}'?<p>
        <p>Once deleted this cannot be undone...</p>
    </div>

    {!! Form::model($article, ['method' => 'DELETE', 'route' => ['articles.destroy', $article->slug]]) !!}
        @include('article.partial.buttons', [
            'submitText' => 'Delete',
            'btnClass' => 'btn-danger'
        ])
    {!! Form::close() !!}
@endsection