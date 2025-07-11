<?php

namespace App\Policies;

use App\Models\User;

class BasePolicy
{
    protected static function isAdmin(User $user): bool
    {
        return $user->role === 'admin';
    }

    protected static function isTechExpert(User $user): bool
    {
        return $user->role === 'tech_expert';
    }

    protected static function isCustomer(User $user): bool
    {
        return $user->role === 'customer';
    }
}
