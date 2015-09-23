@extends('app')

@section('title', 'View Article Details')

@section('content')
    <h1>View Article Details</h1>

    {!! Form::model($user) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
        </div>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-info" href="{{ route('user.index') }}">Cancel</a>
            <a class="btn btn-primary" href="{{ route('user.edit', $user->slug) }}">Edit</a>
            @role('super.admin')
                <a class="btn btn-danger" href="{{ route('user.delete', $user->slug) }}">Delete</a>
            @endrole
        </div>
    {!! Form::close() !!}
@endsection