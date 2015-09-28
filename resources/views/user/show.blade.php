@extends('app')

@section('title', 'View User Details')

@section('content')
    <h1>View User Details</h1>

    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
@endsection