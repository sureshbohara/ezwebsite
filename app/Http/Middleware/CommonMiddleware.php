<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class CommonMiddleware
{
    

    public function handle(Request $request, Closure $next): Response
    {
          if (Auth::check()) {
            return $next($request);
         }
         Auth::logout();
         return redirect()->route('users.login.form');
    }
}
