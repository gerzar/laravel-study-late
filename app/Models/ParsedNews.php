<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'author',
        'description'
    ];
}
