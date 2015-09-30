@extends('app')

@section('title', 'Delete News Article')

@section('content')
    <h1>Delete News Article</h1>

    <div class="alert alert-danger">
        <p>Are you really sure you want to delete '{{ $news->title }}'?<p>
        <p>Once deleted this cannot be undone...</p>
    </div>

    {!! Form::model($news, ['method' => 'DELETE', 'route' => ['news.destroy', $news->slug]]) !!}
        @include('news.partial.buttons', [
            'submitText' => 'Delete',
            'btnClass' => 'btn-danger'
        ])
    {!! Form::close() !!}
@endsection