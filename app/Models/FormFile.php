<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormFile extends Model
{
    protected $fillable = [
        'file_name',
        'file_type_id',
        'file_size_id',
        'is_required'
    ];

    protected $casts = [
        'is_required' => 'boolean'
    ];

    public function setting()
    {
        return $this->belongsTo(FormSetting::class);
    }

    public function getFileTypeAttribute()
    {
        return FileType::query()->where('id', $this->attributes['file_type_id'])->value('type_name');
    }

    public function getFileSizeAttribute()
    {
        return FileSize::query()->where('id', $this->attributes['file_size_id'])->value('file_size_maximum');
    }
}
