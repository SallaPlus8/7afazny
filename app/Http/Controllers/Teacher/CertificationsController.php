<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeacherCertification;
use Illuminate\Support\Facades\Auth;

class CertificationsController extends Controller
{
    public function index()
    {
        // الحصول على لغة التطبيق الحالية
        $locale = app()->getLocale();
    
        // جلب الشهادات الخاصة بالمستخدم مع الاسم المترجم
        $certifications = TeacherCertification::where('teacher_id', Auth::guard('teacher')->id())
            ->get()
            ->map(function ($certification) use ($locale) {
                $certification->translated_name = $certification->getTranslation('name', $locale);
                return $certification;
            });
    
        return view('Teacher.certifications', compact('certifications'));
    }



    public function show($id)
{
    $locale = app()->getLocale();
    $certification = TeacherCertification::where('teacher_id', Auth::guard('teacher')->id())
        ->findOrFail($id);

    $certification->translated_name = $certification->getTranslation('name', $locale);

    return view('Teacher.certification-show', compact('certification'));
}
public function edit($id)
{
    $locale = app()->getLocale();
    $certification = TeacherCertification::where('teacher_id', Auth::guard('teacher')->id())
        ->findOrFail($id);

    $certification->translated_name = $certification->getTranslation('name', $locale);

    return view('Teacher.certification-edit', compact('certification'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image',
        'link' => 'nullable|url',
    ]);

    $certification = TeacherCertification::where('teacher_id', Auth::guard('teacher')->id())
        ->findOrFail($id);

    $certification->setTranslation('name', app()->getLocale(), $request->name);

    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('certifications', 'public');
        $certification->photo = $path;
    }

    $certification->link = $request->link;
    $certification->save();

    return redirect()->route('certifications.index')->with('success', __('Certification updated successfully.'));
}
public function destroy($id)
{
    $certification = TeacherCertification::where('teacher_id', Auth::guard('teacher')->id())
        ->findOrFail($id);

    $certification->delete();

    return redirect()->route('certifications.index')->with('success', __('Certification deleted successfully.'));
}

}    
