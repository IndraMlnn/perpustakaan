@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card Books -->
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-lg font-semibold mb-2">Total Books</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $totalBooks ?? 0 }}</p>
        </div>

        <!-- Card Users -->
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-lg font-semibold mb-2">Total Users</h2>
            <p class="text-3xl font-bold text-green-600">{{ $totalUsers ?? 0 }}</p>
        </div>

        <!-- Card Bookings -->
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-lg font-semibold mb-2">Total Bookings</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $totalBookings ?? 0 }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-bold mb-4">Latest Bookings</h2>
        <div class="bg-white shadow rounded-xl overflow-hidden">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">ID</th>
                        <th class="p-3 text-left">User</th>
                        <th class="p-3 text-left">Book</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestBookings as $booking)
                        <tr class="border-t">
                            <td class="p-3">{{ $booking->id }}</td>
                            <td class="p-3">{{ $booking->user->name }}</td>
                            <td class="p-3">{{ $booking->book->title }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded text-xs
                                    @if($booking->status == 'pending') bg-yellow-100 text-yellow-600
                                    @elseif($booking->status == 'confirmed') bg-green-100 text-green-600
                                    @else bg-red-100 text-red-600 @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="p-3">{{ $booking->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">No bookings yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection