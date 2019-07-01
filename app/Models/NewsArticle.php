<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'introduce',
        'description',
        'image',
        'order',
        'view_count',
    ];
}
