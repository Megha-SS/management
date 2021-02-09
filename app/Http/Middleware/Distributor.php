<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Distributor
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
    
       if(Auth::user()->role=='distributor'){
            return $next($request);
            }
           // abort(403,'page cannot be accessed');

           return redirect('/login');
    }
}
