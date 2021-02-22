<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    public  function delete(User $user,Job $job)
    {

        if($user->role === 'admin'){
            return $user->id !== $job->user_id;
        } else{
            return $user->id === $job->user_id ;
        }

    }



}
