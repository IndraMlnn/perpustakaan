@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold mb-6">📚 My Bookings</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 border">Book Title</th>
                    <th class="px-4 py-3 border">Borrowed At</th>
                    <th class="px-4 py-3 border">Due At</th>
                    <th class="px-4 py-3 border">Returned At</th>
                    <th class="px-4 py-3 border">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border">{{ $booking->book->title }}</td>
                        <td class="px-4 py-3 border">{{ $booking->borrowed_at ?? '-' }}</td>
                        <td class="px-4 py-3 border">{{ $booking->due_at ?? '-' }}</td>
                        <td class="px-4 py-3 border">{{ $booking->returned_at ?? '-' }}</td>
                        <td class="px-4 py-3 border">
                            @switch($booking->status)
                                @case('pending')
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-sm rounded">Pending</span>
                                    @break
                                @case('approved')
                                    <span class="px-2 py-1 bg-blue-100 text-blue-700 text-sm rounded">Approved</span>
                                    @break
                                @case('returned')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-sm rounded">Returned</span>
                                    @break
                                @case('rejected')
                                    <span class="px-2 py-1 bg-red-100 text-red-700 text-sm rounded">Rejected</span>
                                    @break
                            @endswitch
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
