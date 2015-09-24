@extends('app')

@section('title', 'View User Details')

@section('content')
    <h1>View User Details</h1>

    {!! Form::model($user) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('users.index') }}">Cancel</a>
            @role('super.admin')
                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ route('users.delete', $user->id) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection