@extends('app')

@section('title', $article->title)

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <h1>{{ $article->title }}</h1>

            <div>{!! $article->content !!}</div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">

            <h1>Latest Articles</h1>
            <ul>
                <li>Article 1</li>
                <li>Article 2</li>
                <li>Article 3</li>
                <li>Article 4</li>
            </ul>

            <h3>Archived Articles</h3>
            <ul>
                <li>2014</li>
                <li>2013</li>
                <li>2012</li>
                <li>2011</li>
            </ul>
        </div>
    </div>
@endsection