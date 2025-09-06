@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Password (Kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Role</label>
            <select name="role" class="w-full p-2 border rounded" required>
                <option value="member" {{ $user->role === 'member' ? 'selected' : '' }}>Member</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-300 rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
