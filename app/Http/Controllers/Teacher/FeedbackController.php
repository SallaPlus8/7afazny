<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $teacherId = Auth::guard('teacher')->id();

        $feedbacks = Review::where('teacher_id', $teacherId)->with('user')->latest()->get();

        return view('teacher.feedback', compact('feedbacks'));
    }}
