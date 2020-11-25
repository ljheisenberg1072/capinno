<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Campaign extends Model
{
    protected $fillable = [
        'campaign_name',
        'cover',
        'introduction',
        'upper_limit',
        'on_hold',
        'is_top',
        'display_order',
    ];
    protected $casts = [
        'on_hold' => 'boolean',
        'is_top' => 'boolean',
    ];

    public function getCoverUrlAttribute()
    {
        //  如果 cover 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['cover'], ['http://', 'https://'])) {
            return $this->attributes['cover'];
        }
        return Storage::disk('public')->url($this->attributes['cover']);
    }

    //  大赛和比赛类目关联
    public function categories()
    {
        return $this->hasMany(CampaignCategory::class);
    }

    //  大赛和比赛阶段关联
    public function stages()
    {
        return $this->hasMany(CampaignStage::class);
    }

}
