<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name')->nullable();
            $table->string('email')->nullable();
            $table->string('email1')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone1')->nullable();
            $table->string('address')->nullable();
            $table->string('opening_hr')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->text('google_map')->nullable();
            

            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('loader')->nullable();
            $table->string('footer_gateway_img')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('breadcrumb')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();



            $table->string('title1')->nullable();
            $table->string('title2')->nullable();
            $table->string('title3')->nullable();
            $table->string('title4')->nullable();
            $table->string('title5')->nullable();
            $table->string('title6')->nullable();
            $table->string('title7')->nullable();
            $table->string('title8')->nullable();


            $table->text('title_info1')->nullable();
            $table->text('title_info2')->nullable();
            $table->text('title_info3')->nullable();
            $table->text('title_info4')->nullable();
            $table->text('title_info5')->nullable();
            $table->text('title_info6')->nullable();
            $table->text('title_info7')->nullable();
            $table->text('title_info8')->nullable();
            
            

            $table->string('meta_author')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();

            $table->longText('info1')->nullable();
            $table->longText('info2')->nullable();
            $table->longText('info3')->nullable();
            $table->longText('info4')->nullable();


            $table->string('mail_transport')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string('mail_from')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->tinyInteger('smtp_check')->default(1)->nullable();


            $table->text('recaptcha_site_key')->nullable();
            $table->text('recaptcha_secret_key')->nullable();
            $table->tinyInteger('is_recaptcha')->default(0);

            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_client_secret')->nullable();
            $table->string('facebook_redirect')->nullable();
            $table->tinyInteger('is_facebook')->default(1)->nullable();

            $table->string('google_client_id')->nullable();
            $table->string('google_client_secret')->nullable();
            $table->string('google_redirect')->nullable();
            $table->tinyInteger('is_google')->default(0);
            
            $table->text('google_analytic_id')->nullable();
            $table->text('facebook_analytic_id')->nullable();
            

            // payment
            $table->text('paypal_app_id')->nullable();
            $table->text('paypal_client_id')->nullable();
            $table->text('paypal_secrey_id')->nullable();
            $table->text('paypal_mode')->nullable();

            $table->text('stripe_key')->nullable();
            $table->text('stripe_secret')->nullable();
            $table->text('stripe_mode')->nullable();

            $table->text('esewa_merchant_id')->nullable();
            $table->text('esewa_secret_key')->nullable();
            $table->text('esewa_service_url')->nullable();

            $table->text('khalti_public_key')->nullable();
            $table->text('khalti_secret_key')->nullable();
            $table->text('khalti_merchant_id')->nullable();
            $table->text('khalti_base_url')->nullable();

            $table->text('custom_css')->nullable();
            $table->text('custom_js_header')->nullable();
            $table->text('custom_js_body')->nullable();
            $table->text('custom_js_footer')->nullable();
            $table->text('custom_html_header')->nullable();
            $table->text('custom_html_body')->nullable();
            $table->text('custom_html_footer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
