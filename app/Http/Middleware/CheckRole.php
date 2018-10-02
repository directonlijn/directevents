<?php

namespace App\Http\Middleware;

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
        if (!(null !== session('user') && session('user')->hasRole('administrator'))) {
            return 'not an administrator';
        }
        return $next($request);
    }
}
