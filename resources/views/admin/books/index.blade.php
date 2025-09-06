@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Buku</h1>
        <a href="{{ route('admin.books.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
           + Tambah Buku
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Penulis</th>
                    <th class="py-2 px-4 border-b">ISBN</th>
                    <th class="py-2 px-4 border-b">Stok</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $book->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $book->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $book->author }}</td>
                    <td class="py-2 px-4 border-b">{{ $book->isbn }}</td>
                    <td class="py-2 px-4 border-b">{{ $book->stock }}</td>
                    <td class="py-2 px-4 border-b space-x-2">
                        <a href="{{ route('admin.books.show', $book) }}" 
                           class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                           Detail
                        </a>
                        <a href="{{ route('admin.books.edit', $book) }}" 
                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                           Edit
                        </a>
                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                    onclick="return confirm('Yakin ingin menghapus buku ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-3 text-center text-gray-500">Tidak ada buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
