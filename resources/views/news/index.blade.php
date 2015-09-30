@extends('app')

@section('title', 'View All News Articles')

@section('content')
    <h1>View All News Articles</h1>

    @include('errors.errors')
    @include('flash')

    <table class="table table-hover table-bordered table-responsive">
        <thead>
            <th>Title</th>
            <th>Slug</th>
            <th></th>
            <th></th>
            <th style="text-align: center;"><a href="{{ route('news.create') }}" title="Create News Article"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
        </thead>
        <tbody>
        @foreach($allNews as $news)
            <tr>
                <td>{{ $news->title }}</td>
                <td>{{ $news->slug }}</td>
                <td style="text-align: center;"><a href="{{ route('articles.show', $news->slug) }}" title="View Article Details"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></td>
                <td style="text-align: center;"><a href="{{ route('articles.edit', $news->slug) }}" title="Edit Article Details"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                @role('super.admin')
                    <td style="text-align: center;"><a href="{{ route('articles.delete', $news->slug) }}" title="Delete Article"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection