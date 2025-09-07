<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-shadow {
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .nav-item {
            transition: all 0.2s ease;
        }
        
        .nav-item:hover {
            background-color: #f8fafc;
            transform: translateX(4px);
        }
        
        .nav-active {
            background-color: #3b82f6;
            color: white;
            border-radius: 8px;
        }
        
        .nav-active:hover {
            background-color: #2563eb;
            transform: none;
        }
        
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-white sidebar-shadow z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <!-- Logo Section -->
        <div class="px-6 py-8 border-b border-gray-200">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book-open text-white text-lg"></i>
                </div>
                <div class="ml-3">
                    <h1 class="text-xl font-bold text-gray-900">Library</h1>
                    <p class="text-sm text-gray-500">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="px-4 py-6">
            <div class="space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                   @class([
                       'nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-lg',
                       'nav-active' => request()->routeIs('admin.dashboard'),
                       'text-gray-700 hover:text-gray-900' => !request()->routeIs('admin.dashboard'),
                   ])>
                    <i class="fas fa-home w-5 text-center mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Books -->
                <a href="{{ route('admin.books.index') }}"
                   @class([
                       'nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-lg',
                       'nav-active' => request()->routeIs('admin.books.*'),
                       'text-gray-700 hover:text-gray-900' => !request()->routeIs('admin.books.*'),
                   ])>
                    <i class="fas fa-book w-5 text-center mr-3"></i>
                    <span>Books</span>
                </a>

                <!-- Users -->
                <a href="{{ route('admin.users.index') }}"
                   @class([
                       'nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-lg',
                       'nav-active' => request()->routeIs('admin.users.*'),
                       'text-gray-700 hover:text-gray-900' => !request()->routeIs('admin.users.*'),
                   ])>
                    <i class="fas fa-users w-5 text-center mr-3"></i>
                    <span>Users</span>
                </a>

                <!-- Bookings -->
                <a href="{{ route('admin.bookings.index') }}"
                   @class([
                       'nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-lg',
                       'nav-active' => request()->routeIs('admin.bookings.*'),
                       'text-gray-700 hover:text-gray-900' => !request()->routeIs('admin.bookings.*'),
                   ])>
                    <i class="fas fa-calendar-alt w-5 text-center mr-3"></i>
                    <span>Bookings</span>
                </a>

                <!-- Reports -->
                <a href="#"
                   class="nav-item flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-chart-bar w-5 text-center mr-3"></i>
                    <span>Reports</span>
                </a>

                <!-- Settings -->
                <a href="#"
                   class="nav-item flex items-center px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-gray-900 rounded-lg">
                    <i class="fas fa-cog w-5 text-center mr-3"></i>
                    <span>Settings</span>
                </a>
            </div>
        </nav>

        <!-- User Section -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white">
            <!-- User Info -->
            <div class="flex items-center mb-4 p-3 bg-gray-50 rounded-lg">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                    <span class="text-blue-600 font-medium text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
                <div class="ml-3 flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
                </div>
            </div>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full flex items-center justify-center px-3 py-2 text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

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
            
            <!-- Sample Dashboard Content -->
            
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar when clicking overlay
        document.getElementById('overlay').addEventListener('click', function() {
            toggleSidebar();
        });

        // Close sidebar on larger screens
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            }
        });
    </script>
</body>
</html>