<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class EmployeerMiddleware
{
   
   
   public function handle($request, Closure $next){
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request);
        }
        Auth::logout();
       return redirect()->route('users.login.form');
    }
}
