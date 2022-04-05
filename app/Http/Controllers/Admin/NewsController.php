<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin/news/index', [
            'news_list' => News::with(['user', 'category'])->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/news/create', [
            'categories' => Category::all()
        ]);
    }


    public function store(StoreNewsRequest $request)
    {

        $request->validated();

        $data = $request->only(['title', 'status', 'description', 'short_description', 'category_id', 'author', 'image']);
        $news = News::create($data);

        if ($news){
            return back()->with('message', 'The article has been inserted');
        }

        return back()->with('error', 'Something went wrong.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreNewsRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNewsRequest $request, News $news)
    {

        $request->validated();

        $news->fill($request->only(['title', 'status', 'description', 'short_description', 'category_id', 'author', 'image']));

        if ($news->save()){
            return back()->with('message', 'News has been updated');
        }

        return back()->with('error', 'Something went wrong');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json(['status', 'ok']);
        }catch(\Exception) {
            return response()->json(['status' => 'error'], 400);
        }
    }
}
