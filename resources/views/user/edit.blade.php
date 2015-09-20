@extends('app')

@section('title', 'Edit User Details')

@section('content')
    <h1>Edit User Details</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['user.update', $user->id]]) !!}
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
            {!! Form::password('password', ['class' => 'form-control', 'value' => '']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>

        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('user.index') }}">Cancel</a>
            @role('super.admin')
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-danger" href="{{ route('user.delete', $user->id) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection