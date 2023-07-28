<?php

declare (strict_types = 1);

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;

final class UsersPolicy
{
    public function __construct(){}

    public function edit(User $user, User $client): bool {
        return $user->role_id === Role::ADMIN->value || ($user->role_id === Role::EDITOR->value && $client->role_id === Role::USER->value) || $user->id === $client->id;
    }

    public function edit_role(User $user, User $client): bool {
        return $user->role_id === Role::ADMIN->value && $user->id !== $client->id;
    }

    public function delete(User $user, User $client): bool {
        return $user->role_id === Role::ADMIN->value || $user->id === $client->id;
    }

    public function viewAny(User $user): bool {

        return in_array(
            needle: $user->role_id,
            haystack: [Role::ADMIN->value, Role::EDITOR->value]
        );
    }
}
