<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class CampaignCategory extends Model
{
    use DefaultDatetimeFormat;

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
