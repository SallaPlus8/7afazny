<?php

namespace App\Http\Controllers\Auth\USer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // دوال أخرى...

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        // إبطال الجلسة
        $request->session()->invalidate();

        // إعادة توليد رمز CSRF
        $request->session()->regenerateToken();

        return redirect()->route('user.login')->with('status', 'تم تسجيل الخروج بنجاح.');
    }
}
