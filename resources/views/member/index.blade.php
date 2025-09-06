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

  <!-- Recommended Books -->
  <section class="mt-12">
    <h3 class="text-2xl font-bold mb-6">Recommended for You</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach($books as $book)
        <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition">
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