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
    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 text-sm font-semibold">
            <tr>
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Judul</th>
                <th class="py-3 px-4 text-left">Penulis</th>
                <th class="py-3 px-4 text-left">ISBN</th>
                <th class="py-3 px-4 text-left">Stok</th>
                <th class="py-3 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-sm">
            @forelse($books as $book)
                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                    <td class="py-2 px-4">{{ $book->id }}</td>
                    <td class="py-2 px-4">{{ $book->title }}</td>
                    <td class="py-2 px-4">{{ $book->author }}</td>
                    <td class="py-2 px-4">{{ $book->isbn }}</td>
                    <td class="py-2 px-4">{{ $book->stock }}</td>
                    <td class="py-2 px-4 space-x-2">
                        <a href="{{ route('admin.books.show', $book) }}" 
                           class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-xs">
                           Detail
                        </a>
                        <a href="{{ route('admin.books.edit', $book) }}" 
                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">
                           Edit
                        </a>
                        <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs"
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
