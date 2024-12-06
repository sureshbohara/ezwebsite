<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Carbon\Carbon;
use Cache;
use App\Models\User;

class OnlineUser
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if (!empty(Auth::check())) {
            $expireTime = Carbon::now()->addMinutes(1);
            
            if (Auth::user()) {
                Cache::put('OnlineUser_' . Auth::user()->id, true, $expireTime);
                $getUserInfo = User::getSingleUser(Auth::user()->id);
                if ($getUserInfo) {
                    $getUserInfo->updated_at = date('Y-m-d H:i:s');
                    $getUserInfo->save();
                }
            }
        }

        return $next($request);
    }
}