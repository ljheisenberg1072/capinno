<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserSign;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserSignPolicy
{
    use HandlesAuthorization;

    public function own(User $user, UserSign $user_sign)
    {
        return $user_sign->user_id == $user->id;
    }
}
