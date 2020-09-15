<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class GuestMiddleware
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
        if (Sentinel::check())
        {
            if (Sentinel::inRole('Admin'))
            {
                return redirect()->route('users.index');
            }
            
            else
            {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
