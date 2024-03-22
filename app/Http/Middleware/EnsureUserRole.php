<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (! in_array($request->user()->role->name, $roles)) {
            // Redirect or abort if the user role is not allowed
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
