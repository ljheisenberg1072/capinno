<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class FormSetting extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'works_name',
        'works_description',
        'attention'
    ];

    public function files()
    {
        return $this->hasMany(FormFile::class);
    }

}
