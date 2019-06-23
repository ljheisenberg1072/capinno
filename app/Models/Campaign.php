<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'on_hold',
    ];
    protected $casts = [
        'on_hold' => 'boolean',
    ];

}
