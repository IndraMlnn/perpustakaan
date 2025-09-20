<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Perpustakaan</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans">

    <!-- Sidebar -->
     @include('partials.navbar-admin')
   

    <!-- Mobile Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

    <!-- Main Content -->
    <div class="md:ml-64">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-30">
            <div class="flex items-center justify-between px-6 py-4">
                <!-- Mobile Menu & Title -->
                <div class="flex items-center">
                    <button onclick="toggleSidebar()"
                            class="md:hidden mr-4 p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Dashboard</h1>
                        <p class="text-sm text-gray-500 hidden sm:block">Manage your library system</p>
                    </div>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center space-x-3">
                    <!-- Search -->
                    <div class="relative hidden sm:block">
                        <input type="text" 
                               placeholder="Search..." 
                               class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-bell"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                    </button>

                    <!-- Profile -->
                    <div class="flex items-center ml-4">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 font-medium text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>