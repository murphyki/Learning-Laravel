@extends('app')

@section('title', $article->title)

@section('content')
    <h1>{{ $article->title }}</h1>

    <div>{!! $article->content !!}</div>
@endsection