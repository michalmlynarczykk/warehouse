<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode('|', $roles);

        $user = $request->user();

        if ($user && array_intersect($roles, [$user->role])) {
            return $next($request);
        }

        abort(401, 'Unauthorized action.');
    }
}
