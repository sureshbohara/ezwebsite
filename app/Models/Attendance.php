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

    public static function getRecord($filters){
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
            ->where('attendances.user_id', $filters['user_id'])
            ->when($filters['attendance_date'], function ($query, $attendance_date) {
                return $query->where('attendances.attendance_date', $attendance_date);
            })
            ->when($filters['attendance_type'], function ($query, $attendance_type) {
                return $query->where('attendances.attendance_type', $attendance_type);
            })
            ->orderBy('attendances.id', 'desc')
            ->paginate(20);

        $query->where('user_id', $userID);
        return $query;
       }

    public static function getRecordReport($filters){
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
        ->when($filters['attendance_date'], function ($query, $attendance_date) {
            return $query->where('attendances.attendance_date', $attendance_date);
        })
        ->when($filters['attendance_type'], function ($query, $attendance_type) {
            return $query->where('attendances.attendance_type', $attendance_type);
        })
        ->orderBy('attendances.id', 'desc');

    if ($roleId != 1) {
        $query->where('user_id', $userID);
    }

    return $query->paginate(20);
}


 
    
}
