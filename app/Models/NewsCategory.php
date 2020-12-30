<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = ['name','order'];
}
