<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Userinfo;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserinfoPolicy
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
     * @param  \App\Models\Userinfo  $userinfo
     * @return mixed
     */
    public function view(User $user, Userinfo $userinfo)
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
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Userinfo  $userinfo
     * @return mixed
     */
    public function update(User $user, Userinfo $userinfo)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Userinfo  $userinfo
     * @return mixed
     */
    public function delete(User $user, Userinfo $userinfo)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Userinfo  $userinfo
     * @return mixed
     */
    public function restore(User $user, Userinfo $userinfo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Userinfo  $userinfo
     * @return mixed
     */
    public function forceDelete(User $user, Userinfo $userinfo)
    {
        //
    }
}
