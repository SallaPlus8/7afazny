<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.teacher.register'); // تأكد من وجود الملف في resources/views/auth/teacher/register.blade.php
    }

    public function register(Request $request)
    {
        // تحقق من صحة البيانات المدخلة في النموذج
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'topic' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // إنشاء معلم جديد مع الحقول المطلوبة، بالإضافة للحقول الإضافية
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'topic' => 'Quran',
            'timezone' => 'Asia/Riyadh', // يمكنك تخصيص قيمة `timezone` هنا
            'available' => true, // تحديد قيمة `available` (مثلاً جعله متاحًا دائمًا)
            'password' => Hash::make($request->password),
        ]);

        // إعادة توجيه المستخدم إلى صفحة تسجيل الدخول للمعلم
        return redirect()->route('teacher.login')->with('success', 'تم تسجيلك بنجاح كمعلم.');
    }
}