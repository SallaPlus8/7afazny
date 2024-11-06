<?php

namespace App\Http\Controllers\Teacher;



use App\Models\Order;
use App\Models\TeacherUser;
use Illuminate\Http\Request;
use App\Models\CurrentBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CurrentBookingController extends Controller
{
    // عرض جميع الحجوزات الحالية
    public function index()
    {
        $teacherId = Auth::guard('teacher')->id();
        $bookings = Order::where('teacher_id', $teacherId)->where('confirm',0)->get();
        
        return view('teacher.currentbooking', compact('bookings'));
    }
    

    // عرض تفاصيل حجز معين
    public function show($id)
    {
        $booking = Order::findOrFail($id);
        return view('Order.show', compact('booking'));
    }

    // تعديل حجز موجود
    public function edit($id)
    {
        $booking = Order::findOrFail($id);
        return view('current_bookings.edit', compact('booking'));
    }

    public function confirm($id)
    {
        // العثور على الحجز
        $booking = Order::findOrFail($id);
    
        // تأكيد الحجز
        $booking->confirm = 1;
        $booking->save();
    
        // جلب المعرفات الخاصة بالمعلم والطالب من الحجز
        $teacherId = $booking->teacher_id;
        $userId = $booking->user_id;
    
        // التحقق من عدم وجود السجل مسبقًا في جدول الربط
        $exists = TeacherUser::where('teacher_id', $teacherId)
                             ->where('user_id', $userId)
                             ->exists();
    
        // إذا لم يكن موجودًا، يتم إضافته
        if (!$exists) {
            TeacherUser::create([
                'teacher_id' => $teacherId,
                'user_id' => $userId,
            ]);
        }
    
        return redirect()->route('current_bookings.index')->with('status', __('Booking confirmed successfully.'));
    }
    // حذف حجز
    public function destroy($id)
    {
        $booking = Order::findOrFail($id);
        $booking->delete();

        return redirect()->route('current_bookings.index')->with('success', 'Booking deleted successfully');
    }
}
