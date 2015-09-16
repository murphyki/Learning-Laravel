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
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('user.index') }}">Cancel</a>
            @role('super.admin')
                <a class="btn btn-default" href="{{ route('user.edit', $user->id) }}">Edit</a>
                <a class="btn btn-default" href="{{ route('user.delete', $user->id) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection