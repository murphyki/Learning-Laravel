@extends('app')

@section('title', $news->title)

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <h1>{{ $news->title }}</h1>
            <hr/>

            <div>{!! $news->content !!}</div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">

        </div>
    </div>
@endsection