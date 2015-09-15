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
    {!! Form::close() !!}
@endsection