<?php

// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {

    // عرض صفحة تسجيل الدخول الخاصة بالأدمن
    public function showAdminLoginForm() {
        return view('auth.admin.login');
    }

    // عملية تسجيل الدخول للأدمن
    public function adminLogin(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->withInput($request->only('email', 'remember'));
    }

    // عرض صفحة تسجيل الدخول الخاصة بالمعلم
    public function showTeacherLoginForm() {
        return view('auth.teacher.login');
    }

    // عملية تسجيل الدخول للمعلم
    public function teacherLogin(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($credentials, $request->remember)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->withInput($request->only('email', 'remember'));
    }

    // عرض صفحة تسجيل الدخول الخاصة بالمستخدم العادي
    public function showUserLoginForm() {
        return view('auth.user.login');
    }

    // عملية تسجيل الدخول للمستخدم العادي
    public function userLogin(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials, $request->remember)) {
            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة.',
        ])->withInput($request->only('email', 'remember'));
    }
}
