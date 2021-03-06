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
        if(Auth::check() && Auth::user()->role=='admin' || Auth::check() && Auth::user()->role=='teacher')
            return $next($request);

        return redirect('/')->with(['error'=>"You do not have permissions for that"]);
    }
}
