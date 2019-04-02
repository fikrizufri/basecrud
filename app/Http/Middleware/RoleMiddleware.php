<?php

namespace App\Http\Middleware;

use Closure;
use App\Permissions\HasPermissionsTrait;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!$request->user()->hasRole($role)) {
            abort(503);
        }
        if ($permission !== null && !$request->user()->can($permission)) {
            abort(503);
        }
        return $next($request);
    }
}
