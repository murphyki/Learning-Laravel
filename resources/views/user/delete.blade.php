@extends('app')

@section('title', 'Delete User')

@section('content')
    <h1>Delete User</h1>

    <div class="alert alert-danger">
        <p>Are you really sure you want to delete '{{ $user->email }}'?</p>
        <p>Once deleted this cannot be undone...</p>
    </div>

    {!! Form::model($user, ['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
        @include('user.partial.buttons', [
            'submitText' => 'Delete',
            'btnClass' => 'btn-danger'
        ])
    {!! Form::close() !!}
@endsection