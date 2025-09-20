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
    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-100 text-gray-700 text-sm font-semibold">
            <tr>
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Nama</th>
                <th class="py-3 px-4 text-left">Email</th>
                <th class="py-3 px-4 text-left">Role</th>
                <th class="py-3 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 text-sm">
            @forelse($users as $user)
                <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                    <td class="py-2 px-4">{{ $user->id }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">
                        <span class="px-2 py-1 text-xs font-medium rounded 
                            {{ $user->role === 'admin' 
                                ? 'bg-purple-100 text-purple-700' 
                                : 'bg-blue-100 text-blue-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="py-2 px-4 space-x-2">
                        <a href="{{ route('admin.users.edit', $user) }}" 
                           class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">
                           Edit
                        </a>
                        <a href="{{ route('admin.users.show', $user) }}" 
                           class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-xs">
                           Detail
                        </a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs"
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
