<?php

 namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Auth;
use Session;
class SettingController extends Controller
{
    
    private $repository;
    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('admin');
        
    }

    public function updateSettings(SettingRequest $request){
        $this->repository->updateData(1, $request->validated());
        return response()->json(['status' => 200, 'msg' => 'Data Updated successfully.']);
    }

     public function generalSettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.general_settings', $data);
    }

     public function mediaSettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.media_settings', $data);
    }

     public function extraSettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.extra_settings', $data);
    }

    public function seoSettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.seo_setting', $data);
    }

    public function smtpSettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.smtp_settings', $data);
    }

     public function googleSettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.google_settings', $data);
    }

     public function paymentGatewaySettings(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.payment_ateway_settings', $data);
    }
    

    public function customStyle(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.custom_css', $data);
    }

    public function customJs(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.custom_js', $data);
    }

    public function customHtml(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.custom_html', $data);
    }

     public function informationSetting(){
        $this->authorize('add-setting');
        $data['setting'] = Setting::find(1);
        return view('admin.setting.information_setting', $data);
    }
    




}
