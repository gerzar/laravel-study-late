<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function get_news(): mixed
    {
        return \DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->join('users', 'users.id', '=', 'news.author')
            ->select('news.*', 'categories.title as category_name', 'users.name as author_name')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function get_news_by_id(int $id): mixed
    {
        return \DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->join('users', 'users.id', '=', 'news.author')
            ->select('news.*', 'categories.title as category_name', 'users.name as author_name')
            ->where('news.id', '=', $id)
            ->get()[0];
    }

    public function get_news_by(array $array): mixed
    {
        return \DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->join('users', 'users.id', '=', 'news.author')
            ->select('news.*', 'categories.title as category_name', 'users.name as author_name')
            ->where($array)
            ->orderBy('news.id', 'asc')
            ->get();
    }

}
