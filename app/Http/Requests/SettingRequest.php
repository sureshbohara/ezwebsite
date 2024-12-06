<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class SettingRequest extends FormRequest
{
   
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'system_name'         => 'nullable|string|max:255',
            'email'               => 'nullable|email|max:255',
            'email1'              => 'nullable|email|max:255',
            'phone'               => 'nullable|string|max:15',
            'phone1'              => 'nullable|string|max:15',
            'address'             => 'nullable|string|max:500',
            'opening_hr'          => 'nullable|string|max:255',
            'facebook'            => 'nullable|url|max:255',
            'twitter'             => 'nullable|url|max:255',
            'linkedin'            => 'nullable|url|max:255',
            'instagram'           => 'nullable|url|max:255',
            'youtube'             => 'nullable|url|max:255',
            'tiktok'              => 'nullable|url|max:255',
            'google_map'          => 'nullable',

            'favicon'             => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo'                => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'loader'              => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_gateway_img'  => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bg_image'            => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'breadcrumb'          => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image1'              => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2'              => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3'              => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',



            'title1'              => 'nullable|string|max:255',
            'title2'              => 'nullable|string|max:255',
            'title3'              => 'nullable|string|max:255',
            'title4'              => 'nullable|string|max:255',
            'title5'              => 'nullable|string|max:255',
            'title6'              => 'nullable|string|max:255',
            'title7'              => 'nullable|string|max:255',
            'title8'              => 'nullable|string|max:255',


            'title_info1'              => 'nullable',
            'title_info2'              => 'nullable',
            'title_info3'              => 'nullable',
            'title_info4'              => 'nullable',
            'title_info5'              => 'nullable',
            'title_info6'              => 'nullable',
            'title_info7'              => 'nullable',
            'title_info8'              => 'nullable',


            'meta_author'         => 'nullable|string|max:255',
            'meta_title'          => 'nullable|string|max:255',
            'meta_keywords'       => 'nullable|string|max:500',
            'meta_description'    => 'nullable|string|max:1000',

            'info1'               => 'nullable',
            'info2'               => 'nullable',
            'info3'               => 'nullable',


            'mail_transport'      => 'nullable|string|max:255',
            'mail_host'           => 'nullable|string|max:255',
            'mail_port'           => 'nullable|integer',
            'mail_username'       => 'nullable|string|max:255',
            'mail_password'       => 'nullable|string|max:255',
            'mail_encryption'     => 'nullable|string|max:255',
            'mail_from'           => 'nullable|string|max:255',
            'mail_from_name'      => 'nullable|string|max:255',
            'smtp_check'          => 'nullable|boolean',

     
            'recaptcha_site_key' => 'nullable|string|max:500',
            'recaptcha_secret_key'=> 'nullable|string|max:500',
            'is_recaptcha'        => 'nullable|boolean',

            'facebook_client_id' => 'nullable|string|max:255',
            'facebook_client_secret' => 'nullable|string|max:255',
            'facebook_redirect'   => 'nullable|string|max:255',
            'is_facebook'         => 'nullable|boolean',

            'google_client_id'    => 'nullable|string|max:255',
            'google_client_secret'=> 'nullable|string|max:255',
            'google_redirect'     => 'nullable|string|max:255',
            'is_google'           => 'nullable|boolean',

            'google_analytic_id' => 'nullable|string|max:255',
            'facebook_analytic_id'=> 'nullable|string|max:255',

            'paypal_app_id'       => 'nullable|string|max:255',
            'paypal_client_id'    => 'nullable|string|max:255',
            'paypal_secrey_id'    => 'nullable|string|max:255',
            'paypal_mode'         => 'nullable|string|max:50',

            'stripe_key'          => 'nullable|string|max:255',
            'stripe_secret'       => 'nullable|string|max:255',
            'stripe_mode'         => 'nullable|string|max:50',

            'esewa_merchant_id'         => 'nullable|string|max:255',
            'esewa_secret_key'          => 'nullable|string|max:255',
            'esewa_service_url'         => 'nullable|string|max:255',

            'khalti_public_key'   => 'nullable|string|max:255',
            'khalti_secret_key'   => 'nullable|string|max:255',
            'khalti_merchant_id'  => 'nullable|string|max:255',
            'khalti_base_url'     => 'nullable|string|max:255',
            
            'custom_css'          => 'nullable|string|max:5000',
            'custom_js_header'    => 'nullable|string|max:5000',
            'custom_js_body'      => 'nullable|string|max:5000',
            'custom_js_footer'    => 'nullable|string|max:5000',
            'custom_html_header'  => 'nullable|string|max:5000',
            'custom_html_body'    => 'nullable|string|max:5000',
            'custom_html_footer'  => 'nullable|string|max:5000',
        ];
    }

  
}
