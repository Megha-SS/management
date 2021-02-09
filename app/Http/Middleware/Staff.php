<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Staff
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //dd(Auth::user());
        if(Auth::user()->role =='staff')
        {
            return $next($request);
            }

           // abort(403,'page cannot be accessed');
            return redirect('/login');
           // return view('sessions.create');
    }
}
