@extends('layouts.admin')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Role</label>
            <select name="role" class="w-full p-2 border rounded" required>
                <option value="member">Member</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-300 rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
