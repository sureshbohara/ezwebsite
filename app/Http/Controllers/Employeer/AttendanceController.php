<?php

namespace App\Http\Controllers\Employeer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Auth;
class AttendanceController extends Controller
{


    
       public function index(Request $request){
            $data = [];
            $userInfo = User::getUserInfo();
            $roleId = $userInfo['roleId'];
            $data['users'] = User::where('id', Auth::id())->get();
            return view('employee.attendance.index', $data);
        }


    public function store(Request $request){
        $check_attendance = Attendance::CheckAlreadyAttendance($request->user_id, $request->attendance_date);
        if (!empty($check_attendance)) {
            $check_attendance->attendance_type = $request->attendance_type;
            $check_attendance->save();
        } else {
            $attendance = new Attendance;
            $attendance->user_id = $request->user_id;
            $attendance->attendance_date = $request->attendance_date;
            $attendance->attendance_type = $request->attendance_type;
            $attendance->created_by = Auth::user()->id;
            $attendance->save();
        }
        return response()->json(['msg' => 'Attendance created or updated successfully']);
    }


   public function userAtt(Request $request) {
    if($request->isMethod('post')){
        $check_attendance = Attendance::where('user_id', $request->user_id)
        ->where('attendance_date', $request->attendance_date)->first();
        if ($check_attendance) {
            $check_attendance->attendance_type = $request->attendance_type;
            $check_attendance->save();
            return back()->with('success', 'Attendance updated successfully');
        } else {
            $attendance = new Attendance();
            $attendance->user_id = $request->user_id;
            $attendance->attendance_date = $request->attendance_date;
            $attendance->attendance_type = $request->attendance_type;
            $attendance->created_by = Auth::user()->id;
            $attendance->save();
            return back()->with('success', 'Attendance created successfully');
        }
    }

    return view('employee.attendance.attendance_user');
}

}
