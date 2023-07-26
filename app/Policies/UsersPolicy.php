<?php

declare (strict_types = 1);

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;

final class UsersPolicy
{
    public function __construct(){}

    public function create(User $user): bool {

        return $user->role_id == Role::ADMIN->value;
    }
}
