@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <div class="bg-white shadow rounded-xl p-6">
        <div class="flex gap-6">
            {{-- Cover --}}
            <div class="w-40">
                @if($book->cover)
                    <img src="{{ asset('storage/' . $book->cover) }}" 
                         alt="cover" class="w-full h-auto rounded shadow">
                @else
                    <div class="w-full h-56 flex items-center justify-center bg-gray-100 text-gray-400 rounded">
                        No Cover
                    </div>
                @endif
            </div>

            {{-- Detail --}}
            <div class="flex-1">
                <h1 class="text-2xl font-bold mb-2">{{ $book->title }}</h1>
                <p class="text-gray-600 mb-1"><span class="font-medium">Penulis:</span> {{ $book->author ?? '-' }}</p>
                <p class="text-gray-600 mb-1"><span class="font-medium">ISBN:</span> {{ $book->isbn ?? '-' }}</p>
                <p class="text-gray-600 mb-1"><span class="font-medium">Stok:</span> {{ $book->stock }}</p>
                <p class="text-gray-600 mb-3"><span class="font-medium">Ditambahkan:</span> {{ $book->created_at->format('d M Y') }}</p>

                {{-- Deskripsi --}}
                <div class="mt-4">
                    <h2 class="text-lg font-semibold mb-2">Deskripsi</h2>
                    <p class="text-gray-700 whitespace-pre-line">
                        {{ $book->description ?? 'Tidak ada deskripsi' }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Tombol aksi --}}
        <div class="mt-6 flex justify-end space-x-2">
            <a href="{{ route('admin.books.index') }}" 
               class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Kembali</a>
            <a href="{{ route('admin.books.edit', $book) }}" 
               class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" 
                  onsubmit="return confirm('Yakin hapus buku ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
