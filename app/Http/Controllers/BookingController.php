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
    public function store(Book $book , Request $request)
    {

        if ($book->stock <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis, tidak bisa booking.');
        }
         $request->validate([
            'borrowed_at' => 'required|date|after_or_equal:today',
            'due_at' => 'required|date|after:borrowed_at',
        ]);
        // Cek apakah buku masih tersedia
           $activeBooking = Booking::where('book_id', $book->id)
            ->whereIn('status', ['pending', 'approved'])
            ->where(function ($query) use ($request) {
                $query->whereBetween('borrowed_at', [$request->borrowed_at, $request->due_at])
                      ->orWhereBetween('due_at', [$request->borrowed_at, $request->due_at]);
            })
            ->exists();

        if ($activeBooking) {
            return redirect()->back()->with('error', 'Buku sudah dibooking pada tanggal tersebut.');
        }

        Booking::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'borrowed_at' => $request->borrowed_at,
            'due_at' => $request->due_at,
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
