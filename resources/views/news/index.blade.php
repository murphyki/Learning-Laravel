@extends('app')

@section('title', 'View All News Articles')

@section('content')
    <h1>View All News Articles</h1>
    <hr/>

    @include('errors.errors')
    @include('flash')

    @foreach($allNews as $news)
        <div class="row">
            <div class="col-sm-8 news-list-item">
                <a href="{{ route('news.show', $news->slug) }}">
                    <h3>{{ $news->published_at->format('jS F Y') }}&nbsp;&nbsp;{{ $news->title }}</h3>
                    <div>
                        {!! strip_tags(str_limit($news->content, $limit=200, $end='...')) !!}
                    </div>
                </a>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="pull-right">
                    <a href="{{ route('news.show', $news->slug) }}">Read more</a>
                    @role('admin')
                        | <a href="{{ route('news.edit', $news->slug) }}">Edit</a>
                    @endrole
                    @role('super.admin')
                        | <a href="{{ route('news.delete', $news->slug) }}">Delete</a>
                    @endrole
                </div>
            </div>
        </div>
        <hr/>
    @endforeach
@endsection