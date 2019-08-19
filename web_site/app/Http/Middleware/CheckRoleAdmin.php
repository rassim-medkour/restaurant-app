<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckRoleAdmin
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

        if (Auth::guard('admin')->user()->hasAnyRoles('admin')) {
            return $next($request);
        }

        return redirect('/');

    }
}
