@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">📖 Manage Bookings</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

   <div class="overflow-x-auto bg-white shadow rounded-lg">
    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">User</th>
                <th class="px-4 py-2 text-left">Book</th>
                <th class="px-4 py-2 text-left">Borrowed At</th>
                <th class="px-4 py-2 text-left">Due At</th>
                <th class="px-4 py-2 text-left">Returned At</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b border-gray-200">{{ $booking->user->name }}</td>
                    <td class="px-4 py-2 border-b border-gray-200">{{ $booking->book->title }}</td>
                    <td class="px-4 py-2 border-b border-gray-200">{{ $booking->borrowed_at->format('d M Y') ?? '-' }}</td>
                    <td class="px-4 py-2 border-b border-gray-200">{{ $booking->due_at->format('d M Y') ?? '-' }}</td>
                    <td class="px-4 py-2 border-b border-gray-200">{{ $booking->returned_at ?? '-' }}</td>
                    <td class="px-4 py-2 border-b border-gray-200 capitalize">{{ $booking->status }}</td>
                    <td class="px-4 py-2 border-b border-gray-200 space-x-2">
                        @if($booking->status === 'pending')
                            <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Approve</button>
                            </form>
                            <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Reject</button>
                            </form>
                        @elseif($booking->status === 'approved' && ($booking->due_at->lte(\Carbon\Carbon::today())))
                            <form action="{{ route('admin.bookings.return', $booking) }}" method="POST" class="inline-block">
                                @csrf
                                <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Mark Returned</button>
                            </form>
                        @endif
                        <a href="{{ route('admin.bookings.show', $booking) }}">
                            <button class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Detail</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
@endsection