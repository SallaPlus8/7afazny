<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function redirectToLogin(Request $request)
    {
        $role = $request->input('role');

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.login');
            case 'teacher':
                return redirect()->route('teacher.login');
            case 'user':
                return redirect()->route('user.login');
            default:
                return redirect()->back()->withErrors(['role' => 'الرجاء اختيار نوع المستخدم']);
        }
    }
}