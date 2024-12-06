<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Config;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // $mailsetting = Setting::first();
        // if($mailsetting){
        //     $data = [
        //         'driver'            => $mailsetting->mail_transport,
        //         'host'              => $mailsetting->mail_host,
        //         'port'              => $mailsetting->mail_port,
        //         'encryption'        => $mailsetting->mail_encryption,
        //         'username'          => $mailsetting->mail_username,
        //         'password'          => $mailsetting->mail_password,
        //         'from'              => [
        //             'address'=>$mailsetting->mail_from,
        //             'name'   =>$mailsetting->mail_from_name,
        //         ]
        //     ];
        //     Config::set('mail',$data);
        // }
    }
}
