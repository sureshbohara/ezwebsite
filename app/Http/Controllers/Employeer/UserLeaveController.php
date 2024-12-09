<?php

namespace App\Http\Controllers\Employeer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LeavePurpose;
use App\Models\UserLeave;
use Auth;
use DB;
use Session;
class UserLeaveController extends Controller
{
    

     public function index(){
        $data['allData'] = UserLeave::getRecords();
        $data['leave_purposes'] = LeavePurpose::all();
        return view('employee.employee_leave.index', $data);
    }

    public function store(Request $request){
        if ($request->leave_purpose_id == "0") {
            $leavepurpose = new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        } else {
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $employee_leave = new UserLeave();
        $employee_leave->user_id = auth()->user()->id;
        $employee_leave->start_date = date('Y-m-d', strtotime($request->start_date));
        $employee_leave->end_date = date('Y-m-d', strtotime($request->end_date));
        $employee_leave->leave_purpose_id = $leave_purpose_id;
        $employee_leave->save();
        return response()->json(['status' => 200, 'msg' => 'Data created successfully.']);
    }

}
