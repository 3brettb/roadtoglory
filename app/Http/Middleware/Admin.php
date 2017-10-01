<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Test admin priviledges
        if(user()->can('access-admin-portal'))
        {
            return $next($request);
        }
        else
        {
            return redirect()->back();
        }
    }
}
