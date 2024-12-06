<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle($request, Closure $next){
        if (Auth::check() && Auth::user()->role_id == 1) {
            return $next($request);
        }
        Auth::logout();
       return redirect()->route('users.login.form');
    }
}