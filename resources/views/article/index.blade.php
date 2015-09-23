@extends('app')

@section('title', 'View All Articles')

@section('content')
    <h1>View All Articles</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('info'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('info') }}
        </div>
    @endif

    <table class="table table-hover table-bordered table-responsive">
        <thead>
            <th>Title</th>
            <th>Slug</th>
            <th></th>
            <th></th>
            <th style="text-align: center;"><a href="{{ route('article.create') }}" title="Create New Article"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->slug }}</td>
                <td style="text-align: center;"><a href="{{ route('article.show', $article->slug) }}" title="View Article Details"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></td>
                <td style="text-align: center;"><a href="{{ route('article.edit', $article->slug) }}" title="Edit Article Details"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                @role('super.admin')
                    <td style="text-align: center;"><a href="{{ route('article.delete', $article->slug) }}" title="Delete Article"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection