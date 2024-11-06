<?php

namespace App\Http\Controllers\Teacher;

use App\Models\TeacherUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
        public function index()
        {
            $teacherId = Auth::guard('teacher')->id();
            $students = TeacherUser::where('teacher_id', $teacherId)->get();
            $countMyStudents = $students->count();  
            $Oreder = Order::where('teacher_id', $teacherId)->get();
            $countMyOreder = $Oreder->count();  
            return view('dashboard', compact('countMyOreder', 'countMyStudents'));
        }
        
    
    }
