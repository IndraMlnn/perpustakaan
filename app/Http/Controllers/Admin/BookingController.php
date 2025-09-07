<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Tampilkan semua booking (untuk admin).
     */
    public function index()
    {
        $bookings = Booking::with(['book', 'user'])->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Tampilkan detail booking tertentu.
     */
    public function show(Booking $booking)
    {
        $booking->load(['book', 'user']);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Approve booking.
     */
    public function approve(Booking $booking)
    {
        $booking->update([
            'status' => 'approved',
            'borrowed_at' => now(),
            'due_at' => now()->addDays(7), // default 7 hari
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking disetujui.');
    }

    /**
     * Reject booking.
     */
    public function reject(Booking $booking)
    {
        $booking->update([
            'status' => 'rejected',
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking ditolak.');
    }

    /**
     * Tandai buku sudah dikembalikan.
     */
    public function returnBook(Booking $booking)
    {
        $booking->update([
            'status' => 'returned',
            'returned_at' => now(),
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Buku telah dikembalikan.');
    }
}
