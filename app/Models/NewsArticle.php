<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsArticle extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'category_id',
        'title',
        'excerpt',
        'cover',
        'content',
        'on_show',
        'display_order',
        'review_count'
    ];

    protected $casts = ['on_show' => 'boolean'];

    public function getCoverUrlAttribute()
    {
        //  如果 cover 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['cover'], ['http://', 'https://'])) {
            return $this->attributes['cover'];
        }
        return Storage::disk('public')->url($this->attributes['cover']);
    }

    public function scopeWithCategory($query, $category)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($category) {
            case 'activity':
                $query->activity();
                break;

            default:
                $query->report();
                break;
        }
    }

    public function scopeReport($query)
    {

        return $query->where('category_id', 1);
    }

    public function scopeActivity($query)
    {

        return $query->where('category_id', 2);
    }
}
