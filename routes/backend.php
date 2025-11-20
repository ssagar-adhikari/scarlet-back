
<?php

use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

// dd('here');
Route::get('/admin/check', function () {
    // return 'here';
})->name('admin.check');

// backend routes
// Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
Route::get('profile', [App\Http\Controllers\Backend\DashboardController::class, 'profile'])->name('admin.profile');
Route::post('profile', [App\Http\Controllers\Backend\DashboardController::class, 'updateProfile'])->name('admin.profile');
Route::get('categories-list', [App\Http\Controllers\Backend\CategoryController::class, 'getCategories'])->name('categories-list');


// Route::put('/category/update', [App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('admin.category.update');
Route::resource('category', App\Http\Controllers\Backend\CategoryController::class)->names([
    'index' => 'admin.category.index',
    'create' => 'admin.category.create',
    'store' => 'admin.category.store',
    'show' => 'admin.category.show',
    'edit' => 'admin.category.edit',
    'update' => 'admin.category.update',
    'destroy' => 'admin.category.destroy',
]);
Route::resource('product', App\Http\Controllers\Backend\ProductController::class)->names([
    'index' => 'admin.product.index',
    'create' => 'admin.product.create',
    'store' => 'admin.product.store',
    'show' => 'admin.product.show',
    'edit' => 'admin.product.edit',
    'update' => 'admin.product.update',
    'destroy' => 'admin.product.destroy',
]);

Route::resource('banner', App\Http\Controllers\Backend\BannerController::class)->names([
    'index' => 'admin.banner.index',
    'create' => 'admin.banner.create',
    'store' => 'admin.banner.store',
    'show' => 'admin.banner.show',
    'edit' => 'admin.banner.edit',
    'update' => 'admin.banner.update',
    'destroy' => 'admin.banner.destroy',
]);
Route::resource('page', App\Http\Controllers\Backend\CategoryController::class)->names([
    'index' => 'admin.page.index',
    'create' => 'admin.page.create',
    'store' => 'admin.page.store',
    'show' => 'admin.page.show',
    'edit' => 'admin.page.edit',
    'update' => 'admin.page.update',
    'destroy' => 'admin.page.destroy',
]);
Route::resource('social', App\Http\Controllers\Backend\SocailmediaController::class)->names([
    'index' => 'admin.social.index',
    'create' => 'admin.social.create',
    'store' => 'admin.social.store',
    'show' => 'admin.social.show',
    'edit' => 'admin.social.edit',
    'update' => 'admin.social.update',
    'destroy' => 'admin.social.destroy',
]);
Route::get('user/order-history/{id}', [UserController::class, 'userOrderHistory'])->name('admin.user.order-history');
Route::delete('user/order-single/{id}', [UserController::class, 'userOrderRemove'])->name('admin.order-user.destroy');
Route::resource('user', App\Http\Controllers\Backend\UserController::class)->names([
    'index' => 'admin.user.index',
    'create' => 'admin.user.create',
    'store' => 'admin.user.store',
    'show' => 'admin.user.show',
    'edit' => 'admin.user.edit',
    'update' => 'admin.user.update',
    'destroy' => 'admin.user.destroy',
]);
Route::resource('order', App\Http\Controllers\Backend\OrderController::class)->names([
    'index' => 'admin.order.index',
    'create' => 'admin.order.create',
    'store' => 'admin.order.store',
    'show' => 'admin.order.show',
    'edit' => 'admin.order.edit',
    'update' => 'admin.order.update',
    'destroy' => 'admin.order.destroy',
]);
Route::resource('inquiry', App\Http\Controllers\Backend\InquiryController::class)->names([
    'index' => 'admin.inquiry.index',
    'create' => 'admin.inquiry.create',
    'store' => 'admin.inquiry.store',
    'show' => 'admin.inquiry.show',
    'edit' => 'admin.inquiry.edit',
    'update' => 'admin.inquiry.update',
    'destroy' => 'admin.inquiry.destroy',
]);
Route::resource('reservation', App\Http\Controllers\Backend\ReservationController::class)->names([
    'index' => 'admin.reservation.index',
    'create' => 'admin.reservation.create',
    'store' => 'admin.reservation.store',
    'show' => 'admin.reservation.show',
    'edit' => 'admin.reservation.edit',
    'update' => 'admin.reservation.update',
    'destroy' => 'admin.reservation.destroy',
]);
Route::resource('setting', App\Http\Controllers\Backend\SettingController::class)->names([
    'index' => 'admin.setting.index',
    'create' => 'admin.setting.create',
    'store' => 'admin.setting.store',
    'show' => 'admin.setting.show',
    'edit' => 'admin.setting.edit',
    'update' => 'admin.setting.update',
    'destroy' => 'admin.setting.destroy',
]);
// Route::resource('about', App\Http\Controllers\Backend\AboutController::class)->names([
//     'index' => 'admin.about.index',
//     'create' => 'admin.about.create',
//     'store' => 'admin.about.store',
//     'show' => 'admin.about.show',
//     'edit' => 'admin.about.edit',
//     'update' => 'admin.about.update',
//     'destroy' => 'admin.about.destroy',
// ]);
Route::resource('team', App\Http\Controllers\Backend\TeamController::class)->names([
    'index' => 'admin.team.index',
    'create' => 'admin.team.create',
    'store' => 'admin.team.store',
    'show' => 'admin.team.show',
    'edit' => 'admin.team.edit',
    'update' => 'admin.team.update',
    'destroy' => 'admin.team.destroy',
]);
// Route::resource('testimonial', App\Http\Controllers\Backend\TestimonialController::class)->names([
//     'index' => 'admin.testimonial.index',
//     'create' => 'admin.testimonial.create',
//     'store' => 'admin.testimonial.store',
//     'show' => 'admin.testimonial.show',
//     'edit' => 'admin.testimonial.edit',
//     'update' => 'admin.testimonial.update',
//     'destroy' => 'admin.testimonial.destroy',
// ]);

Route::resource('faq', App\Http\Controllers\Backend\FaqController::class)->names([
    'index' => 'admin.faq.index',
    'create' => 'admin.faq.create',
    'store' => 'admin.faq.store',
    'show' => 'admin.faq.show',
    'edit' => 'admin.faq.edit',
    'update' => 'admin.faq.update',
    'destroy' => 'admin.faq.destroy',
]);
Route::resource('feature', App\Http\Controllers\Backend\FeatureController::class)->names([
    'index' => 'admin.feature.index',
    'create' => 'admin.feature.create',
    'store' => 'admin.feature.store',
    'show' => 'admin.feature.show',
    'edit' => 'admin.feature.edit',
    'update' => 'admin.feature.update',
    'destroy' => 'admin.feature.destroy',
]);


Route::get('/admin/flush-database', [App\Http\Controllers\Backend\DashboardController::class, 'flushDatabase']);
