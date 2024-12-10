<?php
namespace App\Helpers;
use Carbon\Carbon;
class UserHelper
{

    public static function isOnline($user){
        $threshold = Carbon::now()->subMinutes(5);
        return $user->last_login_at >= $threshold;
    }
}
