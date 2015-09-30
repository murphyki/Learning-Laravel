@extends('app')

@section('title', 'Create User')

@section('content')
    <h1>Create User</h1>

    @include('errors.errors')

    {!! Form::open(['route' => 'users.store']) !!}
        @include('user.partial.form', ['submitText' => 'Create', 'id' => ''])
        @include('user.partial.buttons', [
            'submitText' => 'Create',
            'btnClass' => 'btn-primary'
        ])
    {!! Form::close() !!}
@endsection