<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'book'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    public function show(Booking $booking)
    {   
        
        return view('admin.bookings.show', compact('booking'));
    }

    public function approve(Booking $booking)
    {
        $booking->update([
            'status' => 'approved',
            'borrowed_at' => now(),
        
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking disetujui');
    }

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        return redirect()->route('admin.bookings.index')->with('success', 'Booking ditolak');
    }

    public function returnBook(Booking $booking)
    {
        $booking->update([
            'status' => 'returned',
            'returned_at' => now(),
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Buku dikembalikan');
    }
}
