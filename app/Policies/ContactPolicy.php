<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Contact;
use App\Models\User;

class ContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Contact $contact): bool
    {
       return $user->id === $contact->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return $user->id === $contact->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Contact $contact): bool
    {
       return $user->id === $contact->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Contact $contact): bool
    {
       return $user->id === $contact->user_id;
    }


    // public function restore(User $user, Contact $contact): bool
    // {
    //     return false;
    // }


    // public function forceDelete(User $user, Contact $contact): bool
    // {
    //     return false;
    // }
}
