<?php

namespace App\Policies;

use App\Models\ContactUsMessage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactusMessagePolicy extends BasePolicy
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
    public function view(User $user, ContactUsMessage $contactUsMessage): bool
    {
        return $this->isAdmin($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ContactUsMessage $contactUsMessage): bool
    {
        die('You are not allowed to update this message.');
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ContactUsMessage $contactUsMessage): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ContactUsMessage $contactUsMessage): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ContactUsMessage $contactUsMessage): bool
    {
        return false;
    }
}
