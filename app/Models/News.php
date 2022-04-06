<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'description',
        'short_description',
        'category_id',
        'author',
        'image'

    ];

//    public function get_news_by_id(int $id): mixed
//    {
//        return \DB::table($this->table)
//            ->join('categories', 'news.category_id', '=', 'categories.id')
//            ->join('users', 'users.id', '=', 'news.author')
//            ->select('news.*', 'categories.title as category_name', 'users.name as author_name')
//            ->where('news.id', '=', $id)
//            ->get()[0];
//    }
//
//    public function get_news_by(array $array): mixed
//    {
//        return \DB::table($this->table)
//            ->join('categories', 'news.category_id', '=', 'categories.id')
//            ->join('users', 'users.id', '=', 'news.author')
//            ->select('news.*', 'categories.title as category_name', 'users.name as author_name')
//            ->where($array)
//            ->orderBy('news.id', 'asc')
//            ->get();
//    }

    public function scopePublished($query)
    {
        return $query->where('status', '=', 'Published');
    }



    //relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
