<?php

namespace App\Http\Controllers\Employeer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeDashboardController extends Controller
{
    
    public function dashboard(){
     return view('employee.dashboard');
    }

}
