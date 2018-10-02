<?php

namespace App\Http\Middleware;

use Closure;

class isStandhouder
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
        // Check if we have a user in our session
        if (\Auth::user()) {
            // If the role is standhouder or administrator than proceed
            if (\Auth::user()->hasRole('standhouder') || \Auth::user()->hasRole('administrator')) {
                return $next($request);
            } else {
                // User has the wrong role
                return redirect('unauthorized')->with('role', 'standhouder');
            }
        }
        // User isn't logged in
        return redirect('login');

    }
}
