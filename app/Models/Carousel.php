<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Carousel extends Model
{
    protected $fillable = [
        'image',
        'title',
        'link',
        'is_show',
        'order',
        'view_count',
    ];

    protected $casts = [
        'is_show' => 'boolean',
    ];

    public function getCarouselImageAttribute()
    {
        //  如果 image 字段是完整的 url 则直接返回
        if(Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }

        return Storage::disk('public')->url($this->attributes['image']);
    }
}
