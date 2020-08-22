<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check() && auth()->user()->my_role_id==1) {
            return redirect()->route('admin.dashboard');
        } elseif(Auth::guard($guard)->check() && auth()->user()->my_role_id==0)
        {
            return redirect(RouteServiceProvider::HOME);
        }else
        {
            return $next($request);
        }

        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);
    }
}
