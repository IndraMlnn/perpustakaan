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