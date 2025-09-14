@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Booking Saya</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <table class="min-w-full border border-gray-200 rounded-lg shadow">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border">#</th>
                <th class="p-3 border">Judul Buku</th>
                <th class="p-3 border">Status</th>
                <th class="p-3 border">Tanggal Booking</th>
                <th class="p-3 border">Aksi</th>                
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $booking->book->title }}</td>
                    <td class="p-3 border">
                        <span class="px-2 py-1 rounded text-sm 
                            @if($booking->status == 'pending') bg-yellow-200 text-yellow-800
                            @elseif($booking->status == 'approved') bg-blue-200 text-blue-800
                            @elseif($booking->status == 'returned') bg-green-200 text-green-800
                            @else bg-red-200 text-red-800 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="p-3 border">{{ $booking->created_at->format('d M Y') }}</td>
                    <td class="p-3 border">
                         @if($booking->status === 'pending')
                        <form action="{{ route('member.bookings.cancel', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin membatalkan booking ini?')">
                                Cancel
                            </button>
                        </form>
                    @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center p-4">Belum ada booking.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
