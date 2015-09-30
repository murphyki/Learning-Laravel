<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $allNews = News::latest()->get();
        return view('news.index', compact('allNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($data = Input::all(), News::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        News::create($data);

        return redirect()->route('news.index')->with('info', 'News article created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  News $news
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($data = Input::all(), News::$rules);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $news->update($data);

        return redirect()->route('news.index')->with('info', 'News article updated successfully');
    }

    /**
     * Confirm removal of the specified resource in storage.
     *
     * @param  Request  $request
     * @param  News $news
     * @return Response
     */
    public function confirmDelete(Request $request, News $news)
    {
        return view('news.delete', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        News::destroy($news->id);

        return redirect()->route('news.index')->with('info', 'News article deleted successfully');
    }
}
