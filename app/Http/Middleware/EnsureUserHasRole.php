<?php

declare (strict_types = 1);

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Enums\Role;
use Closure;

final class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $role1, string $role2): Response
    {
        if (! in_array(
                needle: $request->user()->role_id,
                haystack: [$role1, $role2])
            ) {

            return to_route('dashboard');
        }

        return $next($request);
    }
}
