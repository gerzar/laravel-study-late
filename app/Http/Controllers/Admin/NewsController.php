<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewsRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;

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

        $array = $request->validated();
        $array['author'] = \Auth::user()->id;

        $news = News::create($array);

        if ($news){
            return back()->with('message',  __('messages.admin.news.create.success'));
        }

        return back()->with('error', __('messages.admin.commonError'));

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return RedirectResponse
     */
    public function update(StoreNewsRequest $request, News $news): RedirectResponse
    {

        $news->fill($request->validated());

        if ($news->save()){
            return back()->with('message', __('messages.admin.news.update.success'));
        }

        return back()->with('error', __('messages.admin.commonError'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();
            return response()->json(['status', 'ok']);
        }catch(\Exception) {
            return response()->json(['status' => 'error'], 400);
        }
    }
}
