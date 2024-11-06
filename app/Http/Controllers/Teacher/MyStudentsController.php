<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use App\Models\TeacherUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyStudentsController extends Controller
{
    public function index()
    {
        $teacher = Auth::guard('teacher')->user();
        $students = $teacher->user; // جلب الطلاب المرتبطين بالمعلم الحالي
        return view('Teacher.my-student', compact('students'));
    }
    
    }
