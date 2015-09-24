@extends('app')

@section('title', 'Delete Article')

@section('content')
    <h1>Delete Article</h1>

    <div class="alert alert-danger">
        <p>Are you really sure you want to delete this article?
           Once deleted this cannot be undone...</p>
    </div>

    {!! Form::model($article, ['method' => 'DELETE', 'route' => ['articles.destroy', $article->slug]]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('articles.index') }}">Cancel</a>
            @role('super.admin')
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            @endrole
        </div>
    {!! Form::close() !!}
@endsection