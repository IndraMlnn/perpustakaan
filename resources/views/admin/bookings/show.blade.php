@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-2xl mx-auto bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">Detail Booking</h1>

    <p class="mb-2"><strong>Buku:</strong> {{ $booking->book->title }}</p>
    <p class="mb-2"><strong>User:</strong> {{ $booking->user->name }}</p>
    <p class="mb-2"><strong>Email:</strong> {{ $booking->user->email }}</p>
    <p class="mb-2"><strong>Tanggal Pinjam:</strong> 
        {{ $booking->borrowed_at ? $booking->borrowed_at->format('d/m/Y') : '-' }}
    </p>
    <p class="mb-2"><strong>Jatuh Tempo:</strong> 
        {{ $booking->due_at ? $booking->due_at->format('d/m/Y') : '-' }}
    </p>
    <p class="mb-2"><strong>Status:</strong> 
        <span class="px-2 py-1 text-sm rounded
            @if($booking->status === 'pending') bg-yellow-100 text-yellow-700 
            @elseif($booking->status === 'approved') bg-green-100 text-green-700 
            @elseif($booking->status === 'rejected') bg-red-100 text-red-700 
            @elseif($booking->status === 'returned') bg-blue-100 text-blue-700 
            @endif">
            {{ ucfirst($booking->status) }}
        </span>
    </p>

    <div class="mt-6 flex justify-end space-x-2">
        <a href="{{ route('admin.bookings.index') }}" 
           class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>

        @if($booking->status === 'pending')
        <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" class="inline">
            @csrf
            <button type="submit" 
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Approve
            </button>
        </form>
        <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST" class="inline">
            @csrf
            <button type="submit" 
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                Reject
            </button>
        </form>
        @endif
    </div>
</div>
@endsection
