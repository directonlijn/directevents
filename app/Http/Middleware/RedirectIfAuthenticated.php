<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
//        dd(Auth::user()->hasRole('administrator'));
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->hasRole('administrator')) {
                return redirect('/admin');
            } else if (Auth::user()->hasRole('standhouder')) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
