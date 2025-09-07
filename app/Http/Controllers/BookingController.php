<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Member membuat booking buku.
     */
    public function store(Book $book)
    {
        // Cek apakah buku masih tersedia
        $activeBooking = Booking::where('book_id', $book->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($activeBooking) {
            return redirect()->back()->with('error', 'Buku sedang dibooking/dipinjam.');
        }

        Booking::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return redirect()->route('member.bookings.my')->with('success', 'Booking berhasil, menunggu persetujuan admin.');
    }

    /**
     * Lihat semua booking milik member.
     */
    public function myBookings()
    {
        $bookings = Booking::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('member.bookings.index', compact('bookings'));
    }
}
