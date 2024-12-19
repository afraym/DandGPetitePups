<?php

namespace App\Policies;

use App\Models\Puppy;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PuppyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return $user->role == "super-admin";
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Puppy $puppy): bool
    {
        return $user->hasPermission('view-puppy');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('create-puppy');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Puppy $puppy): bool
    {
        return $user->hasPermission('update-puppy');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Puppy $puppy): bool
    {
        return $user->hasPermission('delete-puppy');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Puppy $puppy): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Puppy $puppy): bool
    {
        //
    }
}
