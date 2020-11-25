<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'leader_name',
        'leader_phone',
        'identity',
        'school_province',
        'school_city',
        'school',
        'province',
        'city',
        'address',
        'leader_email',
        'working_company',
        'team_name',
        'other_members',
        'guide_teachers',
    ];
    protected $casts = [
        'other_members'  => 'json',
        'guide_teachers' => 'json',
    ];

    //  与大赛关联
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

}
