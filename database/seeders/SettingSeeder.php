<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'system_name' => 'System Name',
            'email' => 'info@demo.com',
            'email1' => 'info@demo1.com',
            'phone' => '+1234567890',
            'phone1' => '+0987654321',
            'address' => '123 Main St, Anytown, USA',
            'opening_hr' => 'Mon-Fri: 9am - 5pm',

            'facebook' => 'https://facebook.com/myapplication',
            'twitter' => 'https://twitter.com/myapplication',
            'linkedin' => 'https://linkedin.com/company/myapplication',
            'instagram' => 'https://instagram.com/myapplication',
            'youtube' => 'https://youtube.com/myapplication',
            'tiktok' => 'https://tiktok.com/@myapplication',

            'favicon' => null,
            'logo' => null,
            'loader' => null,
            'footer_gateway_img' => null,
            'bg_image' => null,
            'image1' => null,
            'image2' => null,
            'image3' => null,


            'meta_author' => 'Author Name',
            'meta_title' => 'My Application Meta Title',
            'meta_keywords' => 'application, software, tech',
            'meta_description' => 'This is a description of my application',

            'mail_transport' => 'smtp',
            'mail_host' => 'smtp.mailtrap.io',
            'mail_port' => '2525',
            'mail_username' => 'your_username',
            'mail_password' => 'your_password',
            'mail_encryption' => 'tls',
            'mail_from' => 'info@example.com',
            'mail_from_name' => 'My Application',
            'smtp_check' => 1,


            'recaptcha_site_key' => 'your_site_key',
            'recaptcha_secret_key' => 'your_secret_key',
            'is_recaptcha' => 0,

            'facebook_client_id' => 'your_facebook_client_id',
            'facebook_client_secret' => 'your_facebook_client_secret',
            'facebook_redirect' => 'your_facebook_redirect_url',
            'is_facebook' => 0,

            'google_client_id' => 'your_google_client_id',
            'google_client_secret' => 'your_google_client_secret',
            'google_redirect' => 'your_google_redirect_url',
            'is_google' => 0,

            'google_analytic_id' => 'your_google_analytic_id',
            'facebook_analytic_id' => 'your_facebook_analytic_id',

            'title1' => 'Title 1',
            'title2' => 'Title 2',
            'title3' => 'Title 3',
            'title4' => 'Title 4',
            'title5' => 'Title 5',
            'title6' => 'Title 6',
            'title7' => 'Title 7',
            'title8' => 'Title 8',

            'title_info1' => '',
            'title_info2' => '',
            'title_info3' => '',
            'title_info4' => '',
            'title_info5' => '',
            'title_info6' => '',
            'title_info7' => '',
            'title_info8' => '',

            'info1' => '',
            'info2' => '',
            'info3' => '',

            'paypal_app_id' => '',
            'paypal_client_id' => '',
            'paypal_secrey_id' => '',
            'paypal_mode' => '',

            'stripe_key' => '',
            'stripe_secret' => '',
            'stripe_mode' => '',

            'esewa_merchant_id' => '',
            'esewa_secret_key' => '',
            'esewa_service_url' => '',

            'khalti_public_key' => '',
            'khalti_secret_key' => '',
            'khalti_merchant_id' => '',
            'khalti_base_url' => '',

            'custom_css' => '',
            'custom_js_header' => '',
            'custom_js_body' => '',
            'custom_js_footer' => '',
            'custom_html_header' => '',
            'custom_html_body' => '',
            'custom_html_footer' => '',
            'google_map' => 'https://maps.google.com/?q=my+location',
        ]);
    }
}
