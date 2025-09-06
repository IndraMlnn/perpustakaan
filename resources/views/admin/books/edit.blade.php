@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Buku</h1>

    <form action="{{ route('admin.books.update', $book) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Judul</label>
            <input type="text" name="title" value="{{ $book->title }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Penulis</label>
            <input type="text" name="author" value="{{ $book->author }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">ISBN</label>
            <input type="text" name="isbn" value="{{ $book->isbn }}" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Stok</label>
            <input type="number" name="stock" value="{{ $book->stock }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="description" class="w-full p-2 border rounded">{{ $book->description }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.books.index') }}" class="px-4 py-2 bg-gray-300 rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
