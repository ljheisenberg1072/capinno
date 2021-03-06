<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use DefaultDatetimeFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function myCampaigns()
//    {
//        return $this->hasMany(MyCampaign::class);
//    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    //  与评委关联
    public function judges()
    {
        return $this->hasMany(Judge::class);
    }
}
