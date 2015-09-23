@extends('app')

@section('title', 'Create New Article')

@section('content')
    <h1>Create New Article</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'article.store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('user.index') }}">Cancel</a>
            @role('super.admin')
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            @endrole
        </div>
    {!! Form::close() !!}
@endsection