@extends('app')

@section('title', $article->title)

@section('content')
    <div class="row">
        <h1>{{ $article->title }}</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div>{!! $article->content !!}</div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">

        </div>
    </div>
@endsection