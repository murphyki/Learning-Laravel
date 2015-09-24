@extends('app')

@section('title', 'Create New User')

@section('content')
    <h1>Create New User</h1>

    @include('errors.errors')

    {!! Form::open(['route' => 'users.store']) !!}
        @include('user.partial.form', ['submitText' => 'Create', 'id' => ''])
    {!! Form::close() !!}
@endsection