<?php

namespace App\Policies;

use App\Models\StageSubmission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StageSubmissionPolicy
{
    use HandlesAuthorization;

    public function own(User $user, StageSubmission $stage_submission)
    {
        return $stage_submission->user_id == $user->id;
    }
}
