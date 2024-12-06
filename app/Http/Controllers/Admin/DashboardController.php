<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;
use App\Models\Page;
use App\Models\Plans;
use App\Models\Service;
use App\Models\Gallery;
class DashboardController extends Controller
{


    public function __construct(){
        $this->middleware('admin');
    }

    
   
    public function adminDashboard(){
        $data['getTotalGallery'] = Gallery::getTotalGallery();
        $data['getTotalFaqs'] = Faqs::getTotalFaqs();
        $data['getTotalPlans'] = Plans::getTotalPlans();
        $data['getTotalService'] = Service::getTotalService();
        $data['getTotalFaqsLastWeek'] = Faqs::getTotalFaqsLastWeek();
        $data['getTotalGalleryLastWeek'] = Gallery::getTotalGalleryLastWeek();
        $data['getTotalPlansLastWeek'] = Plans::getTotalPlansLastWeek();
        $data['getTotalServiceLastWeek'] = Service::getTotalServiceLastWeek();
        return view('admin.admin_dashboard',$data);
    }

}
