<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ChooseController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryCategoryController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\InquiryController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SiteConfigurationController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StoryController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Frontend\HomepageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/backend.php';

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Backend Route
Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Slider routes
    Route::resource('slider', SliderController::class)->names([
        'index' => 'slider.index',
        'create' => 'slider.create',
        'store' => 'slider.store',
        'show' => 'slider.show',
        'edit' => 'slider.edit',
        'update' => 'slider.update',
        'destroy' => 'slider.destroy',
    ]);

    // Portfolio routes
    Route::resource('portfolio', PortfolioController::class)->names([
        'index' => 'portfolio.index',
        'create' => 'portfolio.create',
        'store' => 'portfolio.store',
        'show' => 'portfolio.show',
        'edit' => 'portfolio.edit',
        'update' => 'portfolio.update',
        'destroy' => 'portfolio.destroy',
    ]);
    // Portfolio routes
    Route::resource('service', ServiceController::class)->names([
        'index' => 'service.index',
        'create' => 'service.create',
        'store' => 'service.store',
        'show' => 'service.show',
        'edit' => 'service.edit',
        'update' => 'service.update',
        'destroy' => 'service.destroy',
    ]);
    Route::resource('blog', BlogController::class)->names([
        'index' => 'blog.index',
        'create' => 'blog.create',
        'store' => 'blog.store',
        'show' => 'blog.show',
        'edit' => 'blog.edit',
        'update' => 'blog.update',
        'destroy' => 'blog.destroy',
    ]);
    Route::resource('gallery', GalleryController::class)->names([
        'index' => 'gallery.index',
        'create' => 'gallery.create',
        'store' => 'gallery.store',
        'show' => 'gallery.show',
        'edit' => 'gallery.edit',
        'update' => 'gallery.update',
        'destroy' => 'gallery.destroy',
    ]);
    Route::resource('testimonial', TestimonialController::class)->names([
        'index' => 'testimonial.index',
        'create' => 'testimonial.create',
        'store' => 'testimonial.store',
        'show' => 'testimonial.show',
        'edit' => 'testimonial.edit',
        'update' => 'testimonial.update',
        'destroy' => 'testimonial.destroy',
    ]);

    Route::resource('story', StoryController::class)->names([
        'index' => 'story.index',
        'create' => 'story.create',
        'store' => 'story.store',
        'show' => 'story.show',
        'edit' => 'story.edit',
        'update' => 'story.update',
        'destroy' => 'story.destroy',
    ]);
    Route::resource('inquiry', InquiryController::class)->names([
        'index' => 'inquiry.index',
        'create' => 'inquiry.create',
        'store' => 'inquiry.store',
        'show' => 'inquiry.show',
        'edit' => 'inquiry.edit',
        'update' => 'inquiry.update',
        'destroy' => 'inquiry.destroy',
    ]);

    Route::resource('choose', ChooseController::class)->names([
        'index' => 'choose.index',
        'create' => 'choose.create',
        'store' => 'choose.store',
        'show' => 'choose.show',
        'edit' => 'choose.edit',
        'update' => 'choose.update',
        'destroy' => 'choose.destroy',
    ]);

    Route::resource('slider', SliderController::class)->names([
        'index' => 'slider.index',
        'create' => 'slider.create',
        'store' => 'slider.store',
        'show' => 'slider.show',
        'edit' => 'slider.edit',
        'update' => 'slider.update',
        'destroy' => 'slider.destroy',
    ]);

    Route::resource('gallery-categories', GalleryCategoryController::class)->names([
        'index' => 'gallery-categories.index',
        'create' => 'gallery-categories.create',
        'store' => 'gallery-categories.store',
        'show' => 'gallery-categories.show',
        'edit' => 'gallery-categories.edit',
        'update' => 'gallery-categories.update',
        'destroy' => 'gallery-categories.destroy',
    ]);
    Route::get('configuration', [SiteConfigurationController::class, 'edit'])->name('configuration.edit');
    Route::post('configuration', [SiteConfigurationController::class, 'update'])->name('configuration.update');

    Route::get('about', [AboutUsController::class, 'edit'])->name('about.edit');
    Route::post('about', [AboutUsController::class, 'update'])->name('about.update');

    Route::delete('/portfolio/image/{id}', [PortfolioController::class, 'destroyImage'])->name('admin.portfolio.image.destroy');

    // Users
    // Route::resource('users', UserController::class);

    Route::get('/profile', [AuthController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/profile', [AuthController::class, 'profileUpdate'])->name('profile.update');
});

// Frontend Route
Route::get('/', [HomepageController::class, 'home'])->name('frontend.home');
Route::get('/about-us', [HomepageController::class, 'about'])->name('frontend.about');
Route::get('/portfolios', [HomepageController::class, 'portfolio'])->name('frontend.portfolios');
Route::get('/portfolios/{slug}', [HomepageController::class, 'portfolioDetails'])->name('frontend.portfolios.details');
Route::get('/services', [HomepageController::class, 'services'])->name('frontend.services');
Route::get('/services/{slug}', [HomepageController::class, 'serviceDetails'])->name('frontend.services.details');
Route::get('/blogs', [HomepageController::class, 'blogs'])->name('frontend.blogs');
Route::get('/blogs/{slug}', [HomepageController::class, 'blogDetails'])->name('frontend.blogs.details');
Route::get('/gallery', [HomepageController::class, 'gallery'])->name('frontend.gallery');
Route::get('/contact-us', [HomepageController::class, 'contactUs'])->name('frontend.contact');
Route::post('/contact-us', [HomepageController::class, 'storeContact'])->name('frontend.contact.store');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');

    return response()->json([
        'status' => 'success',
        'message' => 'All caches cleared successfully!',
    ]);
});

Route::get('/migrate', function () {
    Artisan::call('migrate', ['--force' => true]);

    return 'Migrations executed successfully!';
});

Route::get('/debug-session', function () {
    return [
        'session_id' => session()->getId(),
        'csrf_token' => csrf_token(),
        'session_driver' => config('session.driver'),
        'session_path' => config('session.path'),
        'storage_path' => storage_path('framework/sessions'),
        'storage_writable' => is_writable(storage_path('framework/sessions')),
        'app_url' => config('app.url'),
        'session_domain' => config('session.domain'),
    ];
});

Route::get('/test-session-persistence', function () {
    // Set a test value in session
    session(['test_time' => now()->toString()]);

    return [
        'session_id' => session()->getId(),
        'test_time_set' => session('test_time'),
        'message' => 'Now refresh this page and see if test_time_set stays the same',
    ];
});

Route::get('/check-session-files', function () {
    $sessionPath = storage_path('framework/sessions');

    // Try to write a test file
    $testFile = $sessionPath.'/test_write_'.time().'.txt';
    $writeSuccess = @file_put_contents($testFile, 'test');

    if ($writeSuccess) {
        @unlink($testFile); // Clean up
    }

    $files = glob($sessionPath.'/*');

    return [
        'session_path' => $sessionPath,
        'path_exists' => is_dir($sessionPath),
        'path_writable' => is_writable($sessionPath),
        'write_test' => $writeSuccess ? 'SUCCESS' : 'FAILED',
        'total_files' => count($files),
        'recent_files' => array_slice(array_map(function ($file) {
            return [
                'name' => basename($file),
                'size' => filesize($file),
                'modified' => date('Y-m-d H:i:s', filemtime($file)),
            ];
        }, $files), -5),
    ];
});

Route::get('/debug-laravel-cookie', function () {
    $sessionId = session()->getId();
    $cookieName = config('session.cookie');

    return [
        'session_id' => $sessionId,
        'cookie_name_config' => $cookieName,
        'all_cookies_received' => request()->cookies->all(),
        'session_config' => [
            'driver' => config('session.driver'),
            'path' => config('session.path'),
            'domain' => config('session.domain'),
            'secure' => config('session.secure'),
            'http_only' => config('session.http_only'),
            'same_site' => config('session.same_site'),
        ],
        'headers_sent' => headers_list(),
    ];
});
