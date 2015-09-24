@extends('app')

@section('title', 'Edit User Details')

@section('content')
    <h1>Edit User Details</h1>

    @include('errors.errors')

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
        @include('user.partial.form', ['submitText' => 'Update', 'id' => $user->id])
    {!! Form::close() !!}
@endsection