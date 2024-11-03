<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard'); // تأكد من وجود الملف في resources/views/teacher/dashboard.blade.php
    }
    }
