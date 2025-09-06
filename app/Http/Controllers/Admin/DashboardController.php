<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     public function index()
    {
        return view('admin.dashboard', [
            'totalBooks' => Book::count(),
            'totalUsers' => User::count(),
            'pendingBookings' => Booking::where('status', 'pending')->count(),
            'latestBookings' => Booking::with(['user', 'book'])->latest()->take(5)->get(),
        ]);
    }
}
