<?php

namespace App\Policies;

use App\Models\User;

class BasePolicy
{
    protected static function isAdmin(User $user): bool
    {
        return $user->role === 'admin';
    }

    protected static function isExpert(User $user): bool
    {
        return $user->role === 'tech_expert';
    }
}
