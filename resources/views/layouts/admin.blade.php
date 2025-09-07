<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white shadow-lg h-screen flex flex-col justify-between fixed md:relative z-20">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-blue-600 mb-8">📚 Admin Panel</h2>
            <nav class="space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                   @class([
                       'flex items-center px-4 py-2 rounded-lg transition',
                       'bg-blue-600 text-white' => request()->routeIs('admin.dashboard'),
                       'hover:bg-gray-200 text-gray-700' => !request()->routeIs('admin.dashboard'),
                   ])>
                   <span class="mr-3">🏠</span> Dashboard
                </a>

                <!-- Books -->
                <a href="{{ route('admin.books.index') }}"
                   @class([
                       'flex items-center px-4 py-2 rounded-lg transition',
                       'bg-blue-600 text-white' => request()->routeIs('admin.books.*'),
                       'hover:bg-gray-200 text-gray-700' => !request()->routeIs('admin.books.*'),
                   ])>
                   <span class="mr-3">📘</span> Books
                </a>

                <!-- Users -->
                <a href="{{ route('admin.users.index') }}"
                   @class([
                       'flex items-center px-4 py-2 rounded-lg transition',
                       'bg-blue-600 text-white' => request()->routeIs('admin.users.*'),
                       'hover:bg-gray-200 text-gray-700' => !request()->routeIs('admin.users.*'),
                   ])>
                   <span class="mr-3">👥</span> Users
                </a>

                <!-- Bookings -->
                <a href="{{ route('admin.bookings.index') }}"
                   @class([
                       'flex items-center px-4 py-2 rounded-lg transition',
                       'bg-blue-600 text-white' => request()->routeIs('admin.bookings.*'),
                       'hover:bg-gray-200 text-gray-700' => !request()->routeIs('admin.bookings.*'),
                   ])>
                   <span class="mr-3">📑</span> Bookings
                </a>
            </nav>
        </div>

        <div class="p-6 border-t">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                    🚪 Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col md:ml-64">
        <!-- Header -->
        <header class="bg-white shadow flex items-center justify-between px-6 py-4 sticky top-0 z-10">
            <!-- Tombol toggle sidebar untuk mobile -->
            <button onclick="document.getElementById('sidebar').classList.toggle('hidden')"
                    class="md:hidden px-2 py-1 bg-gray-200 rounded">
                ☰
            </button>
            <h1 class="text-xl font-semibold">Admin Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                <span class="px-3 py-1 text-sm bg-blue-100 text-blue-600 rounded">{{ Auth::user()->role }}</span>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
