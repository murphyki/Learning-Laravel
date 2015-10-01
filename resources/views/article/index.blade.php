@extends('app')

@section('title', 'View All Articles')

@section('content')
    <h1>View All Articles</h1>
    <hr/>

    @include('errors.errors')
    @include('flash')

    @foreach($articles as $article)
        <div class="row">
            <div class="col-sm-8 news-list-item">
                <a href="{{ route('articles.show', $article->slug) }}">
                    <h3>{{ $article->published_at->format('jS F Y') }}&nbsp;&nbsp;{{ $article->title }}</h3>
                    <div>
                        {!! strip_tags(str_limit($article->content, $limit=200, $end='...')) !!}
                    </div>
                </a>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="pull-right">
                    <a href="{{ route('articles.show', $article->slug) }}">View</a>
                    @role('admin')
                    | <a href="{{ route('articles.edit', $article->slug) }}">Edit</a>
                    @endrole
                    @role('super.admin')
                    | <a href="{{ route('articles.delete', $article->slug) }}">Delete</a>
                    @endrole
                </div>
            </div>
        </div>
        <hr/>
    @endforeach
@endsection