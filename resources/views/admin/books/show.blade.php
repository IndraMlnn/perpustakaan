@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-2xl mx-auto bg-white rounded-lg shadow">
    <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>

    <p class="text-gray-600 mb-2"><strong>Penulis:</strong> {{ $book->author ?? '-' }}</p>
    <p class="text-gray-600 mb-2"><strong>ISBN:</strong> {{ $book->isbn ?? '-' }}</p>
    <p class="text-gray-600 mb-2"><strong>Stok:</strong> {{ $book->stock }}</p>

    <div class="mt-4">
        <h2 class="text-lg font-semibold">Deskripsi</h2>
        <p class="text-gray-700">{{ $book->description ?? 'Tidak ada deskripsi.' }}</p>
    </div>

    <div class="mt-6 flex justify-end space-x-2">
        <a href="{{ route('admin.books.index') }}" 
           class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
        <a href="{{ route('admin.books.edit', $book) }}" 
           class="px-4 py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
    </div>
</div>
@endsection
