<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignCategory extends Model
{
    protected $fillable = [
        'category_name',
        'on_show',
        'display_order'
    ];

    protected $casts = ['on_show' => 'boolean'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
