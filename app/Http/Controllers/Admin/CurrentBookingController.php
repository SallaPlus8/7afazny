<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurrentBookingController extends Controller
{
    public function index()
    {
        
        $bookings = Order::all();
        
        return view('admin.currentbooking', compact('bookings'));
    }
    }
