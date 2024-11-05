<?php

namespace App\Http\Controllers\Teacher;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MyStudentsController extends Controller
{
    public function index()
    {
        $students = User::all(); // استبدلها بفلترة حسب الحاجة
        return view('Teacher.my-student', compact('students'));
    }
    
    }
