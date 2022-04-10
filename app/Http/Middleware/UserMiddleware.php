<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, $guard = 'user')
    {
        if (! Auth::guard($guard)->check()) {
            return  redirect()->route('signin');
        }

        return $next($request);
    }
}
