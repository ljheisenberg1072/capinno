<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = ['type_name'];
}
