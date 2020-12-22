<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        if (Auth::check() && Auth::user()->roleid == '1') {
            return $next($request);
        }
        if(Auth::guest()){
            return redirect('/register')->withErrors(['Register First Before Proceed!!']);
        }else{
            abort(403,'You Are Not Allowed');
        }
    }
}
