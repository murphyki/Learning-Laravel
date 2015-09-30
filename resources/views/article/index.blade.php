@extends('app')

@section('title', 'View All Articles')

@section('content')
    <h1>View All Articles</h1>

    @include('errors.errors')
    @include('flash')

    <table class="table table-hover table-bordered table-responsive">
        <thead>
            <th>Title</th>
            <th>Slug</th>
            <th>Published On</th>
            <th></th>
            <th></th>
            <th style="text-align: center;"><a href="{{ route('articles.create') }}" title="Create New Article"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->slug }}</td>
                <td>{{ $article->published_at }}</td>
                <td style="text-align: center;"><a href="{{ route('articles.show', $article->slug) }}" title="View Article Details"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></td>
                <td style="text-align: center;"><a href="{{ route('articles.edit', $article->slug) }}" title="Edit Article Details"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                @role('super.admin')
                    <td style="text-align: center;"><a href="{{ route('articles.delete', $article->slug) }}" title="Delete Article"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection