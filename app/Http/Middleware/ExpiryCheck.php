<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\UserSubscription;
use Session;

class ExpiryCheck
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
        if(Auth::user()->role =='Admin')
        {

        }
        else{
            $checkExpiry=UserSubscription::where('end_date','>=',date('Y-m-d'))->where('user_id',Auth::user()->id)->first();
            if($checkExpiry === null)
            {
                Session::flash('message-error','Your Subscription is expired');
                Auth::logout();
                return redirect('login');
            }    
        }
        
        return $next($request);
    }
}
