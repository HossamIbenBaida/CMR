<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

use Closure;
use Illuminate\Http\Request;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Cache::get('employee')){ 
            return $next($request);
     } else {
        return redirect('/signin');
     }
    }
}
