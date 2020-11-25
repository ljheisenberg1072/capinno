<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSetting extends Model
{
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
