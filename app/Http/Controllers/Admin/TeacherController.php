<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function allTeacher(){

        $teachers=Teacher::with('reviews')->get();
        return view('admin.teacher',compact('teachers'));
    }
    public function QuranTeacher(){

        $teachers=Teacher::where('topic','Quran')->get();
        return view('admin.teacher',compact('teachers'));
    }
    public function ArabicTeacher(){

        $teachers=Teacher::where('topic','Lang Teacher')->get();
        return view('admin.teacher',compact('teachers'));
    }



    public function update(Request $request, $id)
{
    // جلب المعلم المطلوب حسب الـ id
    $teacher = Teacher::findOrFail($id);

    // التحقق من المدخلات
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:teachers,email,' . $id,
        'phone' => 'nullable|string|max:20',
        'topic' => 'required|string|in:Quran,Lang Teacher,Both',
    ]);

    // تحديث البيانات
    $teacher->name = $request->input('name');
    $teacher->email = $request->input('email');
    $teacher->phone = $request->input('phone');
    $teacher->topic = $request->input('topic');
    $teacher->save();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->back()->with('status', __('Teacher updated successfully.'));
}



public function destroy($id)
{
    // جلب المعلم المطلوب حسب الـ id وحذفه
    $teacher = Teacher::findOrFail($id);
    $teacher->delete();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->back()->with('status', __('Teacher deleted successfully.'));
}


}
