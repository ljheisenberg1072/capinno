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

    public function campaignStage()
    {
        return $this->belongsTo(CampaignStage::class);
    }

    public function files()
    {
        return $this->hasMany(FormFile::class);
    }

}
