@extends('app')

@section('title', 'Edit User Details')

@section('content')
    <h1>Edit User Details</h1>

    @include('errors.errors')

    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
        @include('user.partial.form')

        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('users.index') }}">Cancel</a>
            @role('super.admin')
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-danger" href="{{ route('users.delete', $user->id) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection