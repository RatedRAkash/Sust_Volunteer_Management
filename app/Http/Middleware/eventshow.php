<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class eventshow


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
        if(Auth::check()&&Auth::user()->user_type=='organizer'){
            return $next($request);
        }
        else if(Auth::check()&&Auth::user()->user_type=='volunteer'){
            return $next($request);
        }
        else{
            return redirect('/login');
        }
    }
}
