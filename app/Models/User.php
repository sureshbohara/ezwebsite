<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role_id', 'name', 'email', 'password', 'address', 'mobile','gender', 'image', 'info', 'status',
    ];

    public function getImageUrlAttribute(){
        return $this->image ? asset('images/' . $this->image) : asset('noimage.png');
    }

    static public function getTotalUser($role_id){
    return self::select('users.id')
        ->where('role_id', $role_id)
        ->count();
   }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function scopeActive($query){
        return $query->where('status', 1);
    }


    public function toggleStatus(){
        $this->status = !$this->status;
        $this->save();
    }

    public function OnlineUser(){
     return Cache::has('OnlineUser'.$this->id);
   }

    public static function getEmailSingle($email){
         return self::where('email', $email)->first();
    }
    
   public static function getTokenSingle($token){
        return self::where('remember_token', $token)->first();
    }

}
