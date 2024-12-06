<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CustomerMiddleware
{
    
     public function handle($request, Closure $next){
        if (Auth::check() && Auth::user()->role_id == 3) {
            return $next($request);
        }
        Auth::logout();
       return redirect()->route('users.login.form');
    }
}
