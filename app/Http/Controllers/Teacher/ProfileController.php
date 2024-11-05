<?php
namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Traits\UploadeImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UploadeImages; // تضمين التريت هنا

    public function show()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('teacher.profile', compact('teacher'));
    }

    public function update(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers,email,' . $teacher->id,
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // تحقق من الصورة
        ]);

        $teacher->name = $request->name;
        $teacher->email = $request->email;

        if ($request->filled('password')) {
            $teacher->password = Hash::make($request->password);
        }

        // التحقق من تحميل الصورة واستخدام التريت لتحميلها
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($teacher->photo) {
                $this->deleteImage('images/teachers/' . $teacher->photo);
            }

            // تحميل وتحديث مسار الصورة باستخدام التريت
            $teacher->photo = $this->uploadSingleImage($request->photo, 'images/teachers');
        }

        $teacher->save();

        return redirect()->route('teacher.profile.show')->with('success', __('Profile updated successfully'));
    }
}
