@extends('app')

@section('title', 'Delete User')

@section('content')
    <h1>Delete User</h1>

    <div class="alert alert-danger">
        <p>Are you really sure you want to delete this user?
           Once deleted this cannot be undone...</p>
    </div>

    {!! Form::model($user, ['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
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
                {!! Form::submit('Delete', ['class' => 'btn btn-default']) !!}
            @endrole
        </div>
    {!! Form::close() !!}
@endsection