<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CkeditorController;

/*
|---------------------------------------------------------------------------
| Settings Routes
|---------------------------------------------------------------------------
*/

// Apply 'admin' middleware to all settings routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'admin'])->group(function() {
  
    Route::post('setting',[SettingController::class,'updateSettings'])->name('update.settings');
    Route::match(['GET','POST'],'setting/general',[SettingController::class,'generalSettings'])->name('general.settings');
    Route::match(['GET','POST'],'setting/media',[SettingController::class,'mediaSettings'])->name('media.settings');
    Route::match(['GET','POST'],'setting/extra',[SettingController::class,'extraSettings'])->name('extra.settings');
    Route::match(['GET','POST'],'setting/seo',[SettingController::class,'seoSettings'])->name('seo.settings');
    Route::match(['GET','POST'],'setting/smtp',[SettingController::class,'smtpSettings'])->name('smtp.settings');
    Route::match(['GET','POST'],'setting/google',[SettingController::class,'googleSettings'])->name('google.settings');
    Route::match(['GET','POST'],'setting/payment',[SettingController::class,'paymentGatewaySettings'])->name('payment.settings');
    Route::match(['GET', 'POST'], 'setting/custom/style', [SettingController::class, 'customStyle'])->name('custom.style.settings');
    Route::match(['GET', 'POST'], 'setting/custom/js', [SettingController::class, 'customJs'])->name('custom.js.settings');
    Route::match(['GET', 'POST'], 'setting/custom/html', [SettingController::class, 'customHtml'])->name('custom.html.settings');
    Route::match(['GET', 'POST'], 'setting/information', [SettingController::class, 'informationSetting'])->name('information.setting');

    Route::post('ckeditor/upload', [CkeditorController::class,'ckeditorUpload'])->name('ckeditor.upload');
    Route::post('ckeditor/delete', [CkeditorController::class,'ckeditorDeleteImage'])->name('ckeditor.delete');

});
