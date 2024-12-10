<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'attendance_date',
        'attendance_type',
        'created_by',
        'updated_by',
    ];

    public static function getUserInfo()
    {
        $userID = Auth::id();
        $roleId = Auth::user()->role_id;
        return compact('userID', 'roleId');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function CheckAlreadyAttendance($user_id, $attendance_date)
    {
        return Attendance::where('user_id', $user_id)
            ->where('attendance_date', $attendance_date)
            ->first();
    }

    public static function getRecord($filters) {
        $userInfo = self::getUserInfo();
        $roleId = $userInfo['roleId'];
        $userID = $userInfo['userID'];
        $query = Attendance::select(
            'attendances.*',
            'users.name as user_names',
            'created_by.name as created_name'
        )
        ->join('users', 'users.id', '=', 'attendances.user_id')
        ->leftJoin('users as created_by', 'created_by.id', '=', 'attendances.created_by')
        ->when($filters['user_id'], function ($query, $user_id) {
            return $query->where('attendances.user_id', $user_id);
        })
        ->when($filters['start_date'], function ($query, $start_date) {
            return $query->whereDate('attendances.attendance_date', '>=', $start_date);
        })
        ->when($filters['end_date'], function ($query, $end_date) {
            return $query->whereDate('attendances.attendance_date', '<=', $end_date);
        })
        ->orderBy('attendances.id', 'desc');

        // If the role is not admin (roleId !== 1), limit records to the current user
        if ($roleId !== 1) {
            $query->where('attendances.user_id', $userID);  // Restrict data to the user
        }

        return $query->paginate(30);  // Paginate the results, 20 per page
    }

  

 
    
}
