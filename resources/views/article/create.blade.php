@extends('app')

@section('title', 'Create New Article')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Create New Article</h1>

    @include('errors.errors')

    {!! Form::open(['route' => 'articles.store']) !!}
        @include('article.partial.form')

        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('articles.index') }}">Cancel</a>
            @role('super.admin')
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            @endrole
        </div>
    {!! Form::close() !!}
@endsection