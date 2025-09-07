@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-xl overflow-hidden p-6 md:flex gap-8">
    <!-- Book Cover -->
    <div class="md:w-1/3 flex justify-center items-start">
        @if($book->cover)
            <img src="{{ asset('storage/' . $book->cover) }}" 
                 alt="{{ $book->title }}" 
                 class="rounded-lg shadow-lg w-full max-w-xs object-cover">
        @else
            <img src="https://via.placeholder.com/300x400.png?text=No+Cover" 
                 alt="{{ $book->title }}" 
                 class="rounded-lg shadow-lg w-full max-w-xs object-cover">
        @endif
    </div>

    <!-- Book Details -->
    <div class="md:w-2/3 mt-6 md:mt-0">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $book->title }}</h2>
        <p class="text-lg text-gray-600 mb-4">by {{ $book->author ?? 'Unknown Author' }}</p>

        <div class="mb-4">
            <p><span class="font-semibold">ISBN:</span> {{ $book->isbn ?? '-' }}</p>
            <p><span class="font-semibold">Stock:</span> 
                @if($book->stock > 0)
                    <span class="text-green-600">{{ $book->stock }} available</span>
                @else
                    <span class="text-red-600">Out of stock</span>
                @endif
            </p>
        </div>

        <div class="prose max-w-none mb-6">
            <p>{{ $book->description ?? 'No description available.' }}</p>
        </div>

        <!-- Booking Button -->
        @if($book->stock > 0)
            <button onclick="openModal()" 
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition">
                Book This Book
            </button>
        @else
            <p class="text-red-500 font-semibold">Currently unavailable for booking.</p>
        @endif
    </div>
</div>

<!-- Modal -->
<div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
        <h3 class="text-xl font-bold mb-4">Book: {{ $book->title }}</h3>
        <form action="{{ route('member.bookings.store', $book->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Borrow Date</label>
                <input type="date" name="borrowed_at" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Due Date</label>
                <input type="date" name="due_at" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                    Confirm Booking
                </button>
            </div>
        </form>

        <!-- Close Button -->
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">&times;</button>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('bookingModal').classList.remove('hidden');
        document.getElementById('bookingModal').classList.add('flex');
    }
    function closeModal() {
        document.getElementById('bookingModal').classList.add('hidden');
        document.getElementById('bookingModal').classList.remove('flex');
    }
</script>
@endsection
