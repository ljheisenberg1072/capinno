<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class StageSubmission extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'works_name',
        'works_description',
        'works_category',
        'submission_files',
        'campaign_stage_id',
        'user_id'
    ];

    protected $casts = [
        'submission_files' => 'json'
    ];
}
