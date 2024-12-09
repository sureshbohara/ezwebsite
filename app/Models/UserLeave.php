<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLeave extends Model
{
    use HasFactory;

     public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }

     public function purpose(){
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id','id');
    }


     public static function getRecords(){
      $query = static::with(['user', 'purpose']);
      if (auth()->user()->role_id == 3 || auth()->user()->role_id == 4) {
         $query->where('user_id', auth()->id());
     }
     return $query->orderByDesc('id')->paginate(20);
   }



    public static function getLeaveReport(){
       $query = static::with(['user', 'purpose']);
        if (!empty(request('user_id'))) {
            $query->where('user_id', 'LIKE', '%' . request('user_id') . '%');
        }

        if (!empty(request('start_date')) && !empty(request('end_date'))) {
            $query->whereBetween('created_at', [request('start_date'), request('end_date')]);
        }
    return $query->orderByDesc('id')->paginate(20);
    }



}
