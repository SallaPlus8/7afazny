<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // دوال أخرى...

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // إبطال الجلسة
        $request->session()->invalidate();

        // إعادة توليد رمز CSRF
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'تم تسجيل الخروج بنجاح.');
    }
}
