<?php

use App\Models\TeacherUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Teacher\ProfileController;

use App\Http\Controllers\Teacher\FeedbackController;

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
use App\Http\Controllers\Admin\CurrentBookingController as AdminCurrentBookingController;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
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


        Route::prefix('teachers')->group(function () {
            Route::get('/', [TeacherController::class, 'allTeacher'])->name('teacher.index');
            Route::get('quran', [TeacherController::class, 'QuranTeacher'])->name('quran.teacher.index');
            Route::put('feedback/{id}', [ReviewController::class, 'update'])->name('feedback.update');
            Route::delete('feedback/{id}', [ReviewController::class, 'destroy'])->name('feedback.destroy');
            Route::get('arabic', [TeacherController::class, 'ArabicTeacher'])->name('arabic.teacher.index');
            Route::put('/{id}', [TeacherController::class, 'update'])->name('teachers.update');
            Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
        });

        Route::prefix('students')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('admin.students.index');
                Route::put('/{id}', [StudentController::class, 'update'])->name('admin.students.update');
                Route::delete('/{id}', [StudentController::class, 'destroy'])->name('admin.students.destroy');
            
        });
        Route::prefix('current-bookings')->group(function () {
            Route::get('/', [AdminCurrentBookingController::class, 'index'])->name('admin.current_bookings.index');
            Route::put('{id}/confirm', [AdminCurrentBookingController::class, 'confirm'])->name('current_bookings.confirm');
            Route::delete('/{id}', [AdminCurrentBookingController::class, 'destroy'])->name('current_bookings.destroy');
        });
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard')->middleware('auth.admin');
    });

    // مسارات تسجيل الدخول والخروج للـ Teacher
    // routes/web.php

    Route::prefix('teacher')->group(function () {

        // مسارات تسجيل الدخول والتسجيل وتسجيل الخروج للمعلم
        Route::get('login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.show.login');
        Route::post('login', [TeacherLoginController::class, 'login'])->name('teacher.login');
        Route::post('logout', [TeacherLogoutController::class, 'logout'])->name('teacher.logout');
        Route::get('register', [TeacherRegisterController::class, 'showRegisterForm'])->name('teacher.register');
        Route::post('register', [TeacherRegisterController::class, 'register']);

        // مسارات الطلاب
        Route::prefix('my-students')->group(function () {
            Route::get('/', [MyStudentsController::class, 'index'])->name('students.index');
        });

        // مسارات الشهادات
        Route::prefix('my-certifications')->group(function () {
            Route::get('/', [CertificationsController::class, 'index'])->name('certifications.index');
            Route::put('/{id}', [CertificationsController::class, 'update'])->name('certifications.update');
            Route::delete('/{id}', [CertificationsController::class, 'destroy'])->name('certifications.destroy');
        });

        // مسارات الطلبات الحالية
        Route::prefix('current-bookings')->group(function () {
            Route::get('/', [CurrentBookingController::class, 'index'])->name('current_bookings.index');
            Route::put('{id}/confirm', [CurrentBookingController::class, 'confirm'])->name('current_bookings.confirm');
            Route::delete('/{id}', [CurrentBookingController::class, 'destroy'])->name('current_bookings.destroy');
        });

        // مسارات البروفايل
        Route::prefix('profile')->middleware('auth:teacher')->group(function () {
            Route::get('/', [ProfileController::class, 'show'])->name('teacher.profile.show');
            Route::put('/', [ProfileController::class, 'update'])->name('teacher.profile.update');
        });

        // مسارات الآراء
        Route::prefix('feedback')->middleware('auth:teacher')->group(function () {
            Route::get('/', [FeedbackController::class, 'index'])->name('teacher.feedback');
        });

        // مسار لوحة التحكم
        Route::get('dashboard', [HomeController::class, 'index'])->name('teacher.dashboard')->middleware('auth:teacher');
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
