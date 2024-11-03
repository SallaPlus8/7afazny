<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Teacher\RegisterController as TeacherRegisterController;
use App\Http\Controllers\Auth\Teacher\LoginController as TeacherLoginController;
use App\Http\Controllers\Auth\Teacher\LogoutController as TeacherLogoutController;
use App\Http\Controllers\Auth\User\RegisterController as UserRegisterController;
use App\Http\Controllers\Auth\User\LoginController as UserLoginController;
use App\Http\Controllers\Auth\User\LogoutController as UserLogoutController;

use App\Http\Controllers\Auth\RoleController;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    // Route::get('/', 'HomeController@index');

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    Route::get('/login', function () {
        return view('auth.register');
    });
   
    // الراوت العام لاختيار نوع المستخدم
    Route::get('login/choose-role', [RoleController::class, 'redirectToLogin'])->name('choose-role');
    
    // مسارات تسجيل الدخول والخروج للـ Admin
    Route::prefix('admin')->group(function () {
        Route::get('login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
        Route::post('login', [LoginController::class, 'adminLogin']);
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard')->middleware('auth:admin');
    });
    
    // مسارات تسجيل الدخول والخروج للـ Teacher
    Route::prefix('teacher')->group(function () {
        Route::get('login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
        Route::post('login', [TeacherLoginController::class, 'login']);
        Route::post('logout', [TeacherLogoutController::class, 'logout'])->name('teacher.logout');
        Route::get('register', [TeacherRegisterController::class, 'showRegisterForm'])->name('teacher.register');
        Route::post('register', [TeacherRegisterController::class, 'register']);
        Route::get('dashboard', function () {
            return view('teacher.dashboard');
        })->name('teacher.dashboard')->middleware('auth:teacher');
    });
    
    // مسارات تسجيل الدخول والخروج للـ User
    Route::prefix('user')->group(function () {
        Route::get('login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
        Route::get('register', [UserRegisterController::class, 'showRegisterForm'])->name('user.show.register');
        Route::post('register', [UserRegisterController::class, 'register'])->name('user.register');

        Route::post('login', [UserLoginController::class, 'login']);
        Route::post('logout', [UserLogoutController::class, 'logout'])->name('user.logout');
        Route::get('dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard')->middleware('auth:user');
    });
    });
