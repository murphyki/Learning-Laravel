<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data = Input::all(), Article::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Article::create($data);

        return redirect()->route('articles.index')->with('info', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Article $article
     * @return Response
     */
    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($data = Input::all(), Article::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $article->update($data);

        return redirect()->route('articles.index')->with('info', 'Article updated successfully');
    }

    /**
     * Confirm removal of the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Article $article
     * @return Response
     */
    public function confirmDelete(Request $request, Article $article)
    {
        return view('article.delete', compact('article'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);

        return redirect()->route('articles.index')->with('info', 'Article deleted successfully');
    }
}
