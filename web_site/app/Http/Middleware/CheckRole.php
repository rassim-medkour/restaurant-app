<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* dd();

        if ($request->user === null) {
        return redirect('/');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if ($request->user()->hasAnyRole($roles) || !$roles) {
        return $next($request);
        } */

        if (Auth::guard('admin')->user()->hasAnyRoles('caissier')) {
            return $next($request);
        }

        abort(403);

    }
}
