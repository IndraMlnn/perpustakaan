@extends('layouts.app')

@section('content')
  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl overflow-hidden">
    <div class="p-12 text-center">
      <h2 class="text-4xl md:text-5xl font-bold mb-4">Discover Your Next Favorite Book</h2>
      <p class="text-lg mb-6">Explore thousands of books and borrow them easily from our library system.</p>
      <a href="{{ route('member.books.index') }}" 
         class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100">
        Browse Books
      </a>
    </div>
  </section>

  <!-- Categories -->
  <section class="mt-12">
    <h3 class="text-2xl font-bold mb-6">Categories</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
        <p class="font-semibold">Fiction</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
        <p class="font-semibold">Non-Fiction</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
        <p class="font-semibold">Science</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6 text-center hover:shadow-lg transition">
        <p class="font-semibold">Technology</p>
      </div>
    </div>
  </section>

  <!-- Search -->
  <section class="mt-12 max-w-4xl px-4 mx-auto">
    <h3 class="text-2xl font-bold mb-6 text-center">Search Books</h3>
    <form action="{{ route('member.books.index') }}" method="GET" class="flex items-center space-x-4 justify-center">
      <input type="text" name="search" placeholder="Search by title or author" 
            class="w-full md:w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
            value="{{ request('search') }}">
      
      <button type="submit" 
              class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">
        Search
      </button>

      @if(request('search'))
        <a href="{{ route('member.books.index') }}" 
          class="bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600">
          Reset
        </a>
      @endif
    </form>
  </section>


  <!-- Recommended Books -->
  <section class="mt-12">
    <h3 class="text-2xl font-bold mb-6">Recommended for You</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($books as $book)
        <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
          {{-- Cover Buku --}}
          @if($book->cover)
            <img src="{{ asset('storage/' . $book->cover) }}" 
                 alt="{{ $book->title }}" 
                 class="w-full h-48 object-cover">
          @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
              <span class="text-gray-500">No Cover</span>
            </div>
          @endif

          <div class="p-4">
            <h4 class="font-semibold text-lg">{{ $book->title }}</h4>
            <p class="text-sm text-gray-500">{{ $book->author }}</p>
            <p class="text-xs text-gray-400 mt-1">Stock: {{ $book->stock }}</p>
            <a href="{{ route('member.books.show', $book->id) }}" 
               class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
              View Details
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
