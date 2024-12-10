<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['businesses_id', 'user_id', 'comments'];
    
    public function businesses(){
      return $this->belongsTo(Business::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

  

    public static function getUserInfo(){
        $user = Auth::user();
        return [
            'userID' => $user->id,
            'roleId' => $user->role_id,
            'userName' => $user->name,
        ];
    }

    public static function getRecords(){
    $userInfo = self::getUserInfo();
    $roleId = $userInfo['roleId'];
    $userID = $userInfo['userID'];
    $query = Comments::query();
      if ($roleId != 1) {
        $query->where('user_id', $userID);
      }
     return $query->whereDate('created_at', today())->latest()->paginate(10); 
    }


}
