@extends('app')

@section('title', 'Edit Article Details')

@role('admin')
    @section('additional_scripts', '<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>')
@endrole

@section('content')
    <h1>Edit Article Details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($article, ['method' => 'PUT', 'route' => ['article.update', $article->slug]]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content']) !!}
            <script>
                CKEDITOR.replace( 'content' );
            </script>
        </div>

        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('article.index') }}">Cancel</a>
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            @role('super.admin')
                <a class="btn btn-danger" href="{{ route('article.delete', $article->slug) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection