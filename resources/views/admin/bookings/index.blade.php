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
                    <th class="px-4 py-2 border">User</th>
                    <th class="px-4 py-2 border">Book</th>
                    <th class="px-4 py-2 border">Borrowed At</th>
                    <th class="px-4 py-2 border">Due At</th>
                    <th class="px-4 py-2 border">Returned At</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $booking->user->name }}</td>
                        <td class="px-4 py-2 border">{{ $booking->book->title }}</td>
                        <td class="px-4 py-2 border">{{ $booking->borrowed_at ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $booking->due_at ?? '-' }}</td>
                        <td class="px-4 py-2 border">{{ $booking->returned_at ?? '-' }}</td>
                        <td class="px-4 py-2 border capitalize">{{ $booking->status }}</td>
                        <td class="px-4 py-2 border space-x-2">
                            @if($booking->status === 'pending')
                                <!-- Approve Form -->
                                <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="date" name="due_at" class="border rounded px-2 py-1 text-sm" required>
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Approve</button>
                                </form>

                                <!-- Reject Form -->
                                <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Reject</button>
                                </form>
                            @elseif($booking->status === 'approved')
                                <!-- Return Form -->
                                <form action="{{ route('admin.bookings.return', $booking) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button class="bg-green-500 text-white px-3 py-1 rounded text-sm">Mark Returned</button>
                                </form>
                            @else
                                <span class="text-gray-500">No actions</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection