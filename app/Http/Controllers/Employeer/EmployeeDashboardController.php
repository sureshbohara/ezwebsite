<?php

namespace App\Http\Controllers\Employeer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;

class EmployeeDashboardController extends Controller
{

    public function dashboard(){
        $data['getDatas'] = Business::getRecordsDashboard();
        $data['businessStatusCounts'] = Business::getBusinessStatusCount(); 

        // Debugging output (optional)
        // dd($data['businessStatusCounts']); // You can use dd to debug if the data is correct.
        return view('employee.dashboard', $data);
    }
   


    
}
