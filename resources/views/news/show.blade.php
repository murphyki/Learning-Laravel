@extends('app')

@section('title', $news->title)

@section('content')
    <div class="row">
        <h1>{{ $news->title }}</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div>{!! $news->content !!}</div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">
            <h3>Latest News Articles</h3>
            @foreach($latest as $item)
                <div><a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a></div>
            @endforeach
            <div><a href="{{ route('news.index', \Carbon\Carbon::now()->year) }}">See more...</a></div>

            <h3>Archives</h3>
            @foreach($archives as $archive)
                <div><a href="{{ route('news.index', $archive) }}">{{ $archive }}</a></div>
            @endforeach
        </div>
    </div>
@endsection