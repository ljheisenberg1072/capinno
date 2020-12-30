<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class FileSize extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = ['file_size_maximum'];
}
