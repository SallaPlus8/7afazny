<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // دوال أخرى...

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();

        // إبطال الجلسة
        $request->session()->invalidate();

        // إعادة توليد رمز CSRF
        $request->session()->regenerateToken();

        return redirect()->route('teacher.login')->with('status', 'تم تسجيل الخروج بنجاح.');
    }
}
