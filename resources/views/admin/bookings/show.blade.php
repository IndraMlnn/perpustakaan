@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Detail Booking</h1>

    <div class="bg-white p-6 rounded shadow">
        <p><strong>Judul Buku:</strong> {{ $booking->book->title }}</p>
        <p><strong>Member:</strong> {{ $booking->user->name }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        <p><strong>Dibuat pada:</strong> {{ $booking->created_at->format('d M Y ') }}</p>
      <p><strong>Batas Pinjam:</strong> 
            {{ $booking->due_at ? \Carbon\Carbon::parse($booking->due_at)->format('d M Y ') : '-' }}
        </p>
      <p><strong>Dikembalikan:</strong> 
            {{ $booking->due_at ? \Carbon\Carbon::parse($booking->returned_at)->format('d M Y') : '-' }}
        </p>

      
    </div>

    <div class="mt-4 flex gap-2">
        @if($booking->status == 'pending')
            <form method="POST" action="{{ route('admin.bookings.approve', $booking) }}">
                @csrf
                <button class="px-4 py-2 bg-green-600 text-white rounded">Approve</button>
            </form>
            <form method="POST" action="{{ route('admin.bookings.reject', $booking) }}">
                @csrf
                <button class="px-4 py-2 bg-red-600 text-white rounded">Reject</button>
            </form>
        @elseif($booking->status == 'approved')
            <form method="POST" action="{{ route('admin.bookings.return', $booking) }}">
                @csrf
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Tandai Dikembalikan</button>
            </form>
        @endif

        <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Kembali</a>
    </div>
</div>
@endsection
