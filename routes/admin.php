<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PlansController;

use App\Http\Controllers\Employeer\BusinessController;
use App\Http\Controllers\Employeer\EmployeeDashboardController;
use App\Http\Controllers\Employeer\AttendanceController;
use App\Http\Controllers\Employeer\UserLeaveController;

use App\Http\Controllers\Customer\CustomerDashboardController;

/*
|----------------------------------------------------------------------|
| Authentication Routes                                                   |
|----------------------------------------------------------------------|
*/
Route::get('/admin', [AuthController::class, 'adminLoginForm'])->name('users.login.form');
Route::post('/admin', [AuthController::class, 'adminLoginSubmit'])->name('users.login.submit');


/*
|----------------------------------------------------------------------|
| Admin Routes                                                           |
|----------------------------------------------------------------------|
*/
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    
    // Admin User Routes
    Route::resource('user', AdminController::class);
    Route::post('status/user', [AdminController::class, 'usersStatus'])->name('status.users');

    Route::resource('permission', PermissionController::class, ['except' => 'show']);

    // Banner Routes
    Route::resource('banner', BannerController::class);
    Route::post('status/banner', [BannerController::class, 'bannerStatus'])->name('status.banner');

    // Service Routes
    Route::resource('service', ServiceController::class);
    Route::post('status/service', [ServiceController::class, 'serviceStatus'])->name('status.service');
    Route::post('service/update', [ServiceController::class, 'updateOrderLevel'])->name('service.orderlevel');
    Route::post('service/update/slug', [ServiceController::class, 'updateSlugs'])->name('service.slug.update');
    Route::post('service/type', [ServiceController::class, 'updateType'])->name('service.type');

    // Review Routes
    Route::resource('review', ReviewController::class);
    Route::post('status/review', [ReviewController::class, 'reviewStatus'])->name('status.review');
    Route::post('review/update', [ReviewController::class, 'updateOrderLevel'])->name('review.orderlevel');

    // FAQ Routes
    Route::resource('faqs', FaqsController::class);
    Route::post('status/faqs', [FaqsController::class, 'faqsStatus'])->name('status.faqs');
    Route::post('faqs/update', [FaqsController::class, 'updateOrderLevel'])->name('faqs.orderlevel');

    // Gallery Routes
    Route::resource('gallery', GalleryController::class);
    Route::post('status/gallery', [GalleryController::class, 'galleryStatus'])->name('status.gallery');
    Route::post('gallery/update', [GalleryController::class, 'updateOrderLevel'])->name('gallery.orderlevel');

    // Page Routes
    Route::resource('page', PageController::class);
    Route::post('status/page', [PageController::class, 'pageStatus'])->name('status.page');
    Route::post('page/update', [PageController::class, 'updateOrderLevel'])->name('page.orderlevel');
    Route::post('page/update/slug', [PageController::class, 'updateSlugs'])->name('page.slug.update');
    Route::post('page/type/update', [PageController::class, 'updatePageType'])->name('page.type');

    // Subscriber Routes
    Route::resource('subscribers', SubscriberController::class);
    Route::post('status/subscribers', [SubscriberController::class, 'subscribersStatus'])->name('status.subscribers');
    Route::post('mail/send/users', [SubscriberController::class, 'mailSendUsers'])->name('mail.send.user');
    Route::post('/send-single-mail', [SubscriberController::class, 'mailSendSingle'])->name('mail.send.single');

    // Menu Routes
    Route::resource('menu', MenuController::class);
    Route::post('status/menu', [MenuController::class,'menuStatus'])->name('status.menu');
    Route::post('menu/update', [MenuController::class, 'updateOrderLevel'])->name('menu.orderlevel');
    Route::post('menu/type/update', [MenuController::class, 'updateMenuType'])->name('menu.type');
    Route::post('menu/type/cms', [MenuController::class, 'updateMenuCms'])->name('menu.type.cms');

     // Price Plans Routes
    Route::resource('package', PlansController::class);
    Route::post('status/package', [PlansController::class, 'packageStatus'])->name('status.package');
    Route::post('update/package', [PlansController::class, 'updateOrderLevel'])->name('package.orderlevel');
    Route::match(['post','get'],'business/submit/{id}', [DashboardController::class,'businessDetails'])->name('business.details');
    Route::match(['post','get'],'business/list', [DashboardController::class,'businessList'])->name('business.list');
    Route::match(['get','post'],'reports/attendance', [DashboardController::class,'attendanceReports'])->name('reports.attendance');
    Route::match(['get','post'],'reports/leave', [DashboardController::class,'leaveReports'])->name('reports.leave');

    
});


/*
|----------------------------------------------------------------------|
| Employee Routes                                                         |
|----------------------------------------------------------------------|
*/
Route::prefix('employee')->middleware(['auth', 'employee'])->group(function () {
    Route::get('/dashboard', [EmployeeDashboardController::class, 'dashboard'])->name('employee.dashboard');
    Route::resource('business', BusinessController::class);
    Route::post('business/type/update', [BusinessController::class, 'updateBusinessStatusType'])->name('business.status.type');
    Route::match(['post','get'],'comment/business/submit/{id}', [BusinessController::class,'businessCommentSubmit'])->name('comment.employee.submit');

    Route::resource('attendance', AttendanceController::class);
    Route::match(['get','post'],'users/attendance/', [AttendanceController::class,'userAtt'])->name('attendance.user');
    Route::resource('leave', UserLeaveController::class);

});


/*
|----------------------------------------------------------------------|
| Customer Routes                                                         |
|----------------------------------------------------------------------|
*/
Route::prefix('customer')->middleware(['auth', 'customer'])->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
});



/*
|----------------------------------------------------------------------|
| Common Account Management Routes (Profile, Password)                   |
|----------------------------------------------------------------------|
*/

Route::prefix('accounts')->middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    Route::match(['GET', 'POST'], '/update-profile', [AuthController::class, 'updateProfies'])->name('update.profiles');
    Route::match(['POST', 'GET'], '/update-password', [AuthController::class, 'updateAdminPassword'])->name('update.password');
    Route::match(['GET', 'POST'], '/account/delete', [AuthController::class, 'accountDelete'])->name('account.delete');
});
