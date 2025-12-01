<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group. Make something great!
|
*/

// Homepage route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public pages
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [HomeController::class, 'newsShow'])->name('news.show');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{slug}', [HomeController::class, 'serviceShow'])->name('services.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSubmit'])->name('contact.submit');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    

    // User Management routes
    Route::middleware('permission:manage_users')->group(function () {
        Route::resource('users', UserController::class);
    });

    // Role Management routes
    Route::middleware('permission:manage_roles')->group(function () {
        Route::resource('roles', RoleController::class);
    });

    // Permission Management routes
    Route::middleware('permission:manage_permissions')->group(function () {
        Route::resource('permissions', PermissionController::class);
    });

    // CMS Management routes (Admin prefix)
    Route::prefix('admin')->name('admin.')->group(function () {
        // Site Settings
        Route::middleware('permission:manage_site_settings')->group(function () {
            Route::get('/site-settings', [SiteSettingController::class, 'index'])->name('site-settings.index');
            Route::put('/site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');
        });
        
        // Contact Info
        Route::middleware('permission:manage_contact_info')->group(function () {
            Route::get('/contact-info', [ContactInfoController::class, 'index'])->name('contact-info.index');
            Route::put('/contact-info', [ContactInfoController::class, 'update'])->name('contact-info.update');
        });
        
        // Sliders
        Route::middleware('permission:manage_sliders')->group(function () {
            Route::resource('sliders', SliderController::class);
        });

        // News Management
        Route::middleware('permission:view_news')->group(function () {
            Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
            Route::post('news/{news}/toggle-publish', [\App\Http\Controllers\Admin\NewsController::class, 'togglePublish'])
                ->name('news.toggle-publish')->middleware('permission:publish_news');
        });

        Route::middleware('permission:manage_news_categories')->group(function () {
            Route::resource('news-categories', \App\Http\Controllers\Admin\NewsCategoryController::class);
        });

        Route::middleware('permission:manage_news_tags')->group(function () {
            Route::resource('news-tags', \App\Http\Controllers\Admin\NewsTagController::class);
        });

        // Gallery Management
        Route::middleware('permission:view_gallery')->group(function () {
            Route::resource('gallery', \App\Http\Controllers\Admin\GalleryController::class);
        });

        Route::middleware('permission:manage_gallery_categories')->group(function () {
            Route::resource('gallery-categories', \App\Http\Controllers\Admin\GalleryCategoryController::class);
        });

        // Services Management
        Route::middleware('permission:view_services')->group(function () {
            Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
        });

        // Testimonials Management
        Route::middleware('permission:view_testimonials')->group(function () {
            Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
        });

        // About Content Management
        Route::middleware('permission:manage_about_content')->group(function () {
            Route::resource('about-content', \App\Http\Controllers\Admin\AboutContentController::class);
        });

        Route::middleware('permission:manage_company_values')->group(function () {
            Route::resource('company-values', \App\Http\Controllers\Admin\CompanyValueController::class);
        });

        // Stats Management
        Route::middleware('permission:manage_stats')->group(function () {
            Route::resource('stats', \App\Http\Controllers\Admin\StatController::class);
        });

        // Contact Messages
        Route::middleware('permission:view_contact_messages')->group(function () {
            Route::get('contact-messages', [\App\Http\Controllers\Admin\ContactMessageController::class, 'index'])
                ->name('contact-messages.index');
            Route::get('contact-messages/{contactMessage}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'show'])
                ->name('contact-messages.show');
            Route::post('contact-messages/{contactMessage}/reply', [\App\Http\Controllers\Admin\ContactMessageController::class, 'reply'])
                ->name('contact-messages.reply')->middleware('permission:reply_contact_messages');
            Route::post('contact-messages/{contactMessage}/archive', [\App\Http\Controllers\Admin\ContactMessageController::class, 'archive'])
                ->name('contact-messages.archive');
            Route::delete('contact-messages/{contactMessage}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])
                ->name('contact-messages.destroy')->middleware('permission:delete_contact_messages');
            Route::post('contact-messages/bulk-delete', [\App\Http\Controllers\Admin\ContactMessageController::class, 'bulkDelete'])
                ->name('contact-messages.bulk-delete')->middleware('permission:delete_contact_messages');
            Route::post('contact-messages/bulk-archive', [\App\Http\Controllers\Admin\ContactMessageController::class, 'bulkArchive'])
                ->name('contact-messages.bulk-archive');
        });
    });

});