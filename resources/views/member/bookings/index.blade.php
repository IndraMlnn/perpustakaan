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

  <div class="overflow-x-auto">
    <table class="min-w-full rounded-lg overflow-hidden shadow text-sm md:text-base border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 text-left">#</th>
                <th class="p-3 text-left">Judul Buku</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Tanggal Booking</th>
                <th class="p-3 text-left">Aksi</th>                
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border border-gray-200 text-left">{{ $loop->iteration }}</td>
                    <td class="p-3 border border-gray-200 text-left">{{ $booking->book->title }}</td>
                    <td class="p-3 border border-gray-200 text-left">
                        <span class="px-2 py-1 rounded text-xs md:text-sm 
                            @if($booking->status == 'pending') bg-yellow-200 text-yellow-800
                            @elseif($booking->status == 'approved') bg-blue-200 text-blue-800
                            @elseif($booking->status == 'returned') bg-green-200 text-green-800
                            @else bg-red-200 text-red-800 @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="p-3 border border-gray-200 text-left whitespace-nowrap">
                        {{ $booking->created_at->format('d M Y') }}
                    </td>
                    <td class="p-3 border border-gray-200 text-left">
                        @if($booking->status === 'pending')
                            <form action="{{ route('member.bookings.cancel', $booking->id) }}" 
                                  method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs md:text-sm"
                                    onclick="return confirm('Yakin ingin membatalkan booking ini?')">
                                    Cancel
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-4 text-gray-500 border border-gray-200">
                        Belum ada booking.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>



    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
