<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$permission): Response
    {

        if ($request->user()->hasPermission($permission)) {
            // If the user does not have the permission, abort with a 403 error
            abort(403, 'You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
