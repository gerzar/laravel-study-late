<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(News $news)
    {
        return view('news.index', [
            'news_list' => $news->with(['user', 'category'])->paginate(20),
            'title' => 'Almost TIMES',
            'subtitle' => 'The best news aggregator in the galaxy'
        ]);
    }

    /**
     * @param int $id
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function single_news(int $id, News $news)
    {

        $news = $news->with(['user', 'category'])->find($id);

        return view('news.single-news', [
            'single_news' => $news,
            'title' => $news->title,
            'subtitle' => $news->short_description
        ]);
    }

    /**
     * @param int $category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function news_by_category(int $category_id, News $news)
    {

        $news = $news->with(['user', 'category'])
            ->where('category_id', '=', $category_id)
            ->paginate(20);

        return view('news.index', [
            'news_list' => $news,
            'title' => $news[0]->category->title,
            'subtitle' => 'Now you see the news this category only'
        ]);

    }

}
