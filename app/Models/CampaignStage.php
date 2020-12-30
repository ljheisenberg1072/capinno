<?php

namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class CampaignStage extends Model
{
    use DefaultDatetimeFormat;

    protected $fillable = [
        'stage_name',
        'need_submission',
        'online_offline',
        'submission_start_time',
        'submission_end_time',
        'need_judgement',
        'judgement_start_date',
        'judgement_end_date',
        'result_undetermined',
        'result_start_date',
        'result_end_date',
        'attention',
    ];

    public $dates = [
        'submission_start_time' => 'datetime',
        'submission_end_time' => 'datetime',
        'judgement_start_date' => 'date',
        'judgement_end_date' => 'date',
        'result_start_date' => 'date',
        'result_end_date' => 'date',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function settings()
    {
        return $this->hasMany(FormSetting::class);
    }
}
