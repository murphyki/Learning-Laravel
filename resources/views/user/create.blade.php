@extends('app')

@section('title', 'Create New User')

@section('content')
    <h1>Create New User</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(['route' => 'user.store']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:') !!}
            {!! Form::text('password_confirmation', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('user.index') }}">Cancel</a>
            {!! Form::submit('Create', ['class' => 'btn btn-default']) !!}
        </div>
    {!! Form::close() !!}
@endsection