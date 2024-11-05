<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RoleController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Teacher\ProfileController;
use App\Http\Controllers\Teacher\MyStudentsController;
use App\Http\Controllers\Teacher\CertificationsController;
use App\Http\Controllers\Teacher\CurrentBookingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\User\LoginController as UserLoginController;


use App\Http\Controllers\Auth\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\User\LogoutController as UserLogoutController;
use App\Http\Controllers\Auth\Admin\LogoutController as AdminLogoutController;

use App\Http\Controllers\Auth\Teacher\LoginController as TeacherLoginController;
use App\Http\Controllers\Auth\User\RegisterController as UserRegisterController;
use App\Http\Controllers\Auth\Admin\RegisterController as AdminRegisterController;
use App\Http\Controllers\Auth\Teacher\LogoutController as TeacherLogoutController;
use App\Http\Controllers\Auth\Teacher\RegisterController as TeacherRegisterController;

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    // Route::get('/', 'HomeController@index');

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    /*Route::get('/login', function () {
        return view('auth.register');
    });
   */
    // الراوت العام لاختيار نوع المستخدم
    Route::post('login/choose-role', [RoleController::class, 'redirectToLogin'])->name('choose-role');
    Route::get('choose-role', [RoleController::class, 'index']);

    // مسارات تسجيل الدخول والخروج للـ Admin
    Route::prefix('admin')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.show.login');
        Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
        Route::post('logout', [AdminLogoutController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard')->middleware('auth.admin');
    });
    
    // مسارات تسجيل الدخول والخروج للـ Teacher
  // routes/web.php

Route::prefix('teacher')->group(function () {
    Route::get('login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.show.login');
    Route::post('login', [TeacherLoginController::class, 'login'])->name('teacher.login');
    Route::post('logout', [TeacherLogoutController::class, 'logout'])->name('teacher.logout');
    Route::get('register', [TeacherRegisterController::class, 'showRegisterForm'])->name('teacher.register');
    Route::post('register', [TeacherRegisterController::class, 'register']);
    
    Route::prefix('my-students')->group(function () {
        Route::get('/', [MyStudentsController::class, 'index'])->name('students.index');
    });

    Route::prefix('my-certifications')->group(function () {
        Route::get('/', [CertificationsController::class, 'index'])->name('certifications.index');
        Route::put('/{id}', [CertificationsController::class, 'update'])->name('certifications.update');
        Route::delete('/{id}', [CertificationsController::class, 'destroy'])->name('certifications.destroy');
    });
    
    // مسارات الطلبات الحالية
    Route::prefix('current-bookings')->group(function () {
        Route::get('/', [CurrentBookingController::class, 'index'])->name('current_bookings.index');
        Route::put('current_bookings/{id}/confirm', [CurrentBookingController::class, 'confirm'])->name('current_bookings.confirm');
        Route::delete('/{id}', [CurrentBookingController::class, 'destroy'])->name('current_bookings.destroy');
    });

    Route::get('profile', [ProfileController::class, 'show'])->name('teacher.profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('teacher.profile.update');

    Route::get('dashboard', function () {
        return view('dashboard');
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
        })->name('user.dashboard')->middleware('auth.user');
    });
    });
