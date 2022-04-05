<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    //relations

    public function news(): hasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
