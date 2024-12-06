<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_name',
        'website',
        'domain_request',
        'owner_name',
        'email',
        'phone',
        's_date',
        'e_date',
        'designing_cost',
        'hosting_cost',
        'details',
        'card_name',
        'card_number',
        'expiration_date',
        'security_code',
        'billing_address',
        'business_status',
        'created_by',
        'updated_by',
    ];

    protected static function boot(){
        parent::boot();
        static::deleting(function ($business) {
            $business->comments()->delete();
        });
    }
    

    public function comments(){
        return $this->hasMany(Comment::class, 'businesses_id');
    }

    public static function getRecords()
    {
        $userInfo = self::getUserInfo();
        $roleId = $userInfo['roleId'];
        $userID = $userInfo['userID'];

        $query = Business::query();

        if ($roleId == 2) {
            $query->where('user_id', $userID);
        }

        if (!empty(request('business_status'))) {
            $query->where('business_status', 'LIKE', '%' . request('business_status') . '%');
        }

        if (!empty(request('user_id'))) {
            $query->where('user_id', 'LIKE', '%' . request('user_id') . '%');
        }

        return $query->orderByDesc('id')->get();
    }

    public static function getUserInfo()
    {
        $userID = Auth::id();
        $roleId = Auth::user()->role_id;
        $userName = Auth::user()->name;
        return compact('userID', 'roleId', 'userName');
    }
}
