@extends('app')

@section('title', 'View Article Details')

@section('content')
    <h1>View Article Details</h1>

    {!! Form::model($article) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('article.index') }}">Cancel</a>
            <a class="btn btn-primary" href="{{ route('article.edit', $article->slug) }}">Edit</a>
            @role('super.admin')
                <a class="btn btn-danger" href="{{ route('article.delete', $article->slug) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection