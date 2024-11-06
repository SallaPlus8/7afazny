<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        
        $students = User::all(); // 
    ;
   return view('admin.student', compact('students'));
    }


    public function update(Request $request, $id)
{
    $student = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'nullable|string|in:male,female',
        'email' => 'nullable|string|email|max:255',
    ]);

    $student->name = $request->input('name');
    $student->gender = $request->input('gender');
    $student->email = $request->input('email');
    $student->save();

    return redirect()->route('admin.students.index')->with('status', __('Student updated successfully.'));
}


public function destroy($id)
{
    $student = User::findOrFail($id);
    $student->delete();

    return redirect()->route('admin.students.index')->with('status', __('Student deleted successfully.'));
}


    
}
