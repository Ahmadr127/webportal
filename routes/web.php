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
    });

});