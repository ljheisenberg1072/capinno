<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Judge extends Model
{
    protected $fillable = [
        'avatar',
        'name',
        'company',
        'title',
        'introduction',
        'display_order',
        'review_count',
    ];

    protected $casts = [
        'on_show' => 'boolean',
        'on_judgement' => 'boolean',
    ];

    public function getAvatarUrlAttribute()
    {
        //  如果 avatar 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['avatar'], ['http://', 'https://'])) {
            return $this->attributes['avatar'];
        }
        return Storage::disk('public')->url($this->attributes['avatar']);
    }
}
