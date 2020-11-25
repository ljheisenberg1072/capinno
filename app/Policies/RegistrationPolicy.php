<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Registration;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrationPolicy
{
    use HandlesAuthorization;

    public function own(User $user, Registration $registration)
    {
        return $registration->user_id == $user->id;
    }
}
