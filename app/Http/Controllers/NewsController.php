<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param $year - defaults to null in which case all news articles will be returned
     * @return Response
     */
    public function index($year = null)
    {
        $allNews = null;

        if (is_null($year)) {
            $allNews = News::latest('published_at')->take(100)->get();
        } else {
            $start = Carbon::createFromDate($year, 1, 1);// 01/01/$year
            $end = Carbon::createFromDate($year, 12, 31);// 31/12/$year
            $allNews = News::whereBetween('published_at', [$start, $end])->orderBy('published_at', 'desc')->get();
        }

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
