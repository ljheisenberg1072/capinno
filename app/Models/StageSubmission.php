<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StageSubmission extends Model
{
    protected $fillable = [
        'works_name',
        'works_description',
        'submission_files',
        'campaign_stage_id',
        'user_id'
    ];

    protected $casts = [
        'submission_files' => 'json'
    ];
}
