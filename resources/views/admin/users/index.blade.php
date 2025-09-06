@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar User</h1>
        <a href="{{ route('admin.users.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
           + Tambah User
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
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Role</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">
                        <span class="px-2 py-1 text-sm rounded 
                            {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="py-2 px-4 border-b space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" 
                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                           Edit
                        </a>
                        <a href="{{ route('admin.users.show', $user) }}" 
                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                           Detail
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-3 text-center text-gray-500">Tidak ada user.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
