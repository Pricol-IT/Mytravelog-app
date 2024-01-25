<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DomesticPolicyController;
use App\Http\Controllers\Admin\CityTierController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\InternationalPolicyController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    /**
     * Auth routes
     */
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.admin');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'dashboard');
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');

    });
    Route::middleware(['guest:admin'])->group(function () {
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');


    });
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/settings', 'setting')->name('profile.setting');
        Route::get('/profile', 'profile')->name('profile');
        Route::put('/profile', 'profile_update')->name('profile.update');
    });


    Route::resource('user', UserController::class); 

    Route::resource('service_master', ServiceController::class);

    Route::resource('domestic_policy', DomesticPolicyController::class); 

    Route::resource('city_tier', CityTierController::class);

    Route::resource('grade', GradeController::class); 

    Route::resource('international_policy', InternationalPolicyController::class); 

});
