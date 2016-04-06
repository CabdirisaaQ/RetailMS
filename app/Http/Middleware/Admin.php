<?php

namespace Retailms\Http\Middleware;

//use Auth;
use Closure;
use Retailms\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (auth()->check() && (auth()->user()->permission == "admin" || auth()->user()->permission == "sa")) {
            return $next($request);
        } else {
            return redirect ('/');
        }        
    }
}
