@extends('app')

@section('title', 'View User Details')

@section('content')
    <h1>View User Details</h1>

    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Role(s):
        @for ($i = 0; $i < count($user->roles); $i++)
            {{ $user->roles[$i]->name }}
            @if ($i < (count($user->roles) - 1))
                |
            @endif
        @endfor
    </p>
@endsection