<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.teacher.login'); // تأكد من وجود الملف في resources/views/auth/teacher/login.blade.php
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('teacher')->attempt($credentials, $request->remember)) {
        return redirect()->route('teacher.dashboard'); // استخدم route مع اسم المسار
    }

    return back()->withErrors([
        'email' => 'بيانات الدخول غير صحيحة.',
    ])->withInput($request->only('email'));
}

}
