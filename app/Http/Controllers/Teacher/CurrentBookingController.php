<?php

namespace App\Http\Controllers\Teacher;



use App\Models\Order;
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
        $booking = Order::findOrFail($id);
        $booking->confirm = 1;
        $booking->save();
    
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
