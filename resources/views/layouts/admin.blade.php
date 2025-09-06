<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
            <a href="{{ route('admin.books.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Books</a>
            <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Users</a>
            <a href="{{ route('admin.bookings.index') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Bookings</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-lg font-semibold">Dashboard</h1>
            <div>
                <span class="mr-4">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Logout</button>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
