<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserStory;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserStoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserStory  $userStory
     * @return mixed
     */
    public function view(User $user, UserStory $userStory)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasRole('Backoffice', 'SuperAdmin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserStory  $userStory
     * @return mixed
     */
    public function update(User $user, UserStory $user_story)
    {
        if ($user->hasRole('Backoffice', 'SuperAdmin') && $user_story->tested_at == null) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserStory  $userStory
     * @return mixed
     */
    public function delete(User $user, UserStory $userStory)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserStory  $userStory
     * @return mixed
     */
    public function restore(User $user, UserStory $userStory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserStory  $userStory
     * @return mixed
     */
    public function forceDelete(User $user, UserStory $userStory)
    {
        //
    }
}
