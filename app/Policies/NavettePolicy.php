<?php

namespace App\Policies;

use App\User;
use App\Navette;
use Illuminate\Auth\Access\HandlesAuthorization;

class NavettePolicy
{
    use HandlesAuthorization;
/**
     * Determine whether the user can view the Navette.
     *
     * @param  \App\User  $user
     * @param  \App\Navette  $Navette
     * @return mixed
     */
    public function view(User $user, Navette $Navette)
    {
        // Update $user authorization to view $Navette here.
        return true;
    }

    /**
     * Determine whether the user can create Navette.
     *
     * @param  \App\User  $user
     * @param  \App\Navette  $Navette
     * @return mixed
     */
    public function create(User $user, Navette $Navette)
    {
        // Update $user authorization to create $Navette here.
        return true;
    }

    /**
     * Determine whether the user can update the Navette.
     *
     * @param  \App\User  $user
     * @param  \App\Navette  $Navette
     * @return mixed
     */
    public function update(User $user, Navette $Navette)
    {
        // Update $user authorization to update $Navette here.
        return true;
    }

    /**
     * Determine whether the user can delete the Navette.
     *
     * @param  \App\User  $user
     * @param  \App\Navette  $Navette
     * @return mixed
     */
    public function delete(User $user, Navette $Navette)
    {
        // Update $user authorization to delete $Navette here.
        return true;
    }
}
