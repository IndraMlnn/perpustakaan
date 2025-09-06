@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Booking</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Buku</th>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Tanggal Pinjam</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $booking->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->book->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->user->name }}</td>
                    <td class="py-2 px-4 border-b">
                        {{ $booking->borrowed_at ? $booking->borrowed_at->format('d/m/Y') : '-' }}
                    </td>
                    <td class="py-2 px-4 border-b">
                        <span class="px-2 py-1 text-sm rounded
                            @if($booking->status === 'pending') bg-yellow-100 text-yellow-700 
                            @elseif($booking->status === 'approved') bg-green-100 text-green-700 
                            @elseif($booking->status === 'rejected') bg-red-100 text-red-700 
                            @elseif($booking->status === 'returned') bg-blue-100 text-blue-700 
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="py-2 px-4 border-b space-x-2">
                        <a href="{{ route('admin.bookings.show', $booking) }}" 
                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                           Detail
                        </a>

                        @if($booking->status === 'pending')
                        <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                Reject
                            </button>
                        </form>
                         @elseif($booking->status === 'approved')
                                <!-- Return Form -->
                                <form action="{{ route('admin.bookings.return', $booking) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Mark Returned</button>
                                </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-3 text-center text-gray-500">Tidak ada booking.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
