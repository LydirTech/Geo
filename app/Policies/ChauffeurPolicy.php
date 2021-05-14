<?php

namespace App\Policies;

use App\User;
use App\Chauffeur;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChauffeurPolicy
{
    use HandlesAuthorization;
/**
     * Determine whether the user can view the Chauffeur.
     *
     * @param  \App\User  $user
     * @param  \App\Chauffeur  $Chauffeur
     * @return mixed
     */
    public function view(User $user, Chauffeur $Chauffeur)
    {
        // Update $user authorization to view $Chauffeur here.
        return true;
    }

    /**
     * Determine whether the user can create Chauffeur.
     *
     * @param  \App\User  $user
     * @param  \App\Chauffeur  $Chauffeur
     * @return mixed
     */
    public function create(User $user, Chauffeur $Chauffeur)
    {
        // Update $user authorization to create $Chauffeur here.
        return true;
    }

    /**
     * Determine whether the user can update the Chauffeur.
     *
     * @param  \App\User  $user
     * @param  \App\Chauffeur  $Chauffeur
     * @return mixed
     */
    public function update(User $user, Chauffeur $Chauffeur)
    {
        // Update $user authorization to update $Chauffeur here.
        return true;
    }

    /**
     * Determine whether the user can delete the Chauffeur.
     *
     * @param  \App\User  $user
     * @param  \App\Chauffeur  $Chauffeur
     * @return mixed
     */
    public function delete(User $user, Chauffeur $Chauffeur)
    {
        // Update $user authorization to delete $Chauffeur here.
        return true;
    }
}
