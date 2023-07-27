<?php

declare (strict_types = 1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;
use App\Policies\UsersPolicy;
use App\Models\User;

final class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UsersPolicy::class
    ];

    public function boot(): void
    {
        //
    }
}
