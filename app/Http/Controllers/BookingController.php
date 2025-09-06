<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   

    public function index()
    {
        $bookings = Booking::where('user_id', auth()->id())->latest()->paginate(10);
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request, $bookId)
    {
        $request->validate([
            'borrowed_at' => 'required|date|after_or_equal:today',
            'due_at' => 'required|date|after:borrowed_at',
        ]);

        $book = Book::findOrFail($bookId);

        if ($book->stock <= 0) {
            return back()->with('error', 'Book is out of stock.');
        }

        Booking::create([
            'book_id'     => $book->id,
            'user_id'     => Auth::id(),
            'borrowed_at' => $request->borrowed_at,
            'due_at'      => $request->due_at,
            'status'      => 'pending',
        ]);

        return redirect()->route('member.books.index')->with('success', 'Booking request submitted successfully.');
    }
    

    /**
     * Display the specified resource.
     */

     public function myBookings()
    {
        $bookings = Booking::with('book')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('member.my-bookings', compact('bookings'));
    }
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
