@extends('app')

@section('title', 'Create New User')

@section('content')
    <h1>Create New User</h1>

    @include('errors.errors')

    {!! Form::open(['route' => 'users.store']) !!}
        @include('user.partial.form')

        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('users.index') }}">Cancel</a>
            @role('super.admin')
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            @endrole
        </div>
    {!! Form::close() !!}
@endsection