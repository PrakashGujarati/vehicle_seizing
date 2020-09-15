<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
            $user = Auth::user()()();

            if($user->inRole('Admin'))
            {
                 return $next($request);
            }
            return redirect()->route('login');
        }

        return redirect()->route('login');
    }
}
