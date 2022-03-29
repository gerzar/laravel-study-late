<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = $this->get_news();

        return view('news.index', [
            'news_list' => $news,
            'title' => 'Almost TIMES',
            'subtitle' => 'The best news aggregator in the galaxy'
        ]);
    }

    public function single_news(int $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = $this->get_news($id);

        return view('news.single-news', [
            'single_news' => $news,
            'title' => $news->title,
            'subtitle' => $news->short_description
        ]);
    }

    public function news_by_category(int $category_id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $news = $this->get_news();

        foreach ($news as $news_item) {
            if ($news_item->category_id === $category_id) {
                $result[] = $news_item;
            }
        }

        return view('news.index', [
            'news_list' => $result,
            'title' => $result[0]->category_name,
            'subtitle' => 'Now you see the news this category only'
        ]);

    }

}
