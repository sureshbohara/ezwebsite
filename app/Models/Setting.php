<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'system_name',
        'email',
        'email1',
        'phone',
        'phone1',
        'address',
        'opening_hr',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'tiktok',
        'google_map',
        
        'favicon',
        'logo',
        'loader',
        'footer_gateway_img',
        'bg_image',
        'breadcrumb',
        'image1',
        'image2',
        'image3',

        

        'title1',
        'title2',
        'title3',
        'title4',
        'title5',
        'title6',
        'title7',
        'title8',

        'title_info1',
        'title_info2',
        'title_info3',
        'title_info4',
        'title_info5',
        'title_info6',
        'title_info7',
        'title_info8',


        'meta_author',
        'meta_title',
        'meta_keywords',
        'meta_description',

        'info1',
        'info2',
        'info3',
        'info4',
        
        'mail_transport',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
        'mail_from',
        'mail_from_name',
        'smtp_check',

        'recaptcha_site_key',
        'recaptcha_secret_key',
        'is_recaptcha',
        
        'facebook_client_id',
        'facebook_client_secret',
        'facebook_redirect',
        'is_facebook',

        'google_client_id',
        'google_client_secret',
        'google_redirect',
        'is_google',

        'google_analytic_id',
        'facebook_analytic_id',

        'paypal_app_id',
        'paypal_client_id',
        'paypal_secrey_id',
        'paypal_mode',
        'stripe_key',
        'stripe_secret',
        'stripe_mode',
        
        'esewa_merchant_id',
        'esewa_secret_key',
        'esewa_service_url',

        'khalti_public_key',
        'khalti_secret_key',
        'khalti_merchant_id',
        'khalti_base_url',
        
        'custom_css',
        'custom_js_header',
        'custom_js_body',
        'custom_js_footer',
        'custom_html_header',
        'custom_html_body',
        'custom_html_footer',
    ];

    

}
