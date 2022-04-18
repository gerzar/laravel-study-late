<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * @param News $news
     */
    public function index(News $news)
    {

        return view('news.index', [
            'news_list' => $news->with(['user', 'category'])->paginate(20),
            'title' => 'Almost TIMES',
            'subtitle' => 'The best news aggregator in the galaxy',
        ]);
    }

    /**
     * @param int $id
     * @param News $news
     */
    public function single_news(int $id, News $news)
    {

        $news = $news->with(['user', 'category'])->find($id);

        return view('news.single-news', [
            'single_news' => $news,
            'title' => $news->title,
            'subtitle' => $news->short_description,
            'subscribe_block' => true,
            'category' => $news->category->id
        ]);
    }

    /**
     * @param int $category_id
     */
    public function news_by_category(int $category_id, News $news)
    {

        $news = $news->with(['user', 'category'])
            ->where('category_id', '=', $category_id)
            ->paginate(20);

        return view('news.index', [
            'news_list' => $news,
            'title' => $news[0]->category->title,
            'subtitle' => 'Now you see the news this category only',
            'subscribe_block' => true,
            'category' => $category_id
        ]);

    }

    public function feed(News $news)
    {

        $subscribes = ((Auth::user()) ? User::find(Auth::user()->__get('id')) : null );

        $news_list = [];

        if ($subscribes) {

            $categories = [];

            foreach ($subscribes->category as $subscribe) {
                $categories[] = $subscribe->id;
            }

            $news_list = $news->with(['user', 'category'])
                ->whereIn('category_id', $categories)
                ->orderBy('id', 'desc')
                ->paginate(20);
        }


        return view('news.index', [
            'news_list' => $news_list,
            'title' => 'Almost TIMES',
            'subtitle' => 'Personal subscriptions',
        ]);
    }

}
