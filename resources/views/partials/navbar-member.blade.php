<header class="bg-white border-b border-gray-200 sticky top-0 z-50 backdrop-blur-sm bg-white/95">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and Brand -->
            <div class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-xl">
                    <i class="fas fa-book-open text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-900">LibraryHub</h1>
                    <p class="text-xs text-gray-500 hidden sm:block">Management System</p>
                </div>
            </div>

            <!-- Navigation Menu -->
           <nav class="hidden md:flex items-center space-x-1">
                <a href="{{ route('member.books.index') }}" 
                @class([
                    'flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                    'text-blue-600 bg-blue-600/10 border border-blue-600/20' => request()->routeIs('member.books.index'),
                    'text-gray-600 hover:text-blue-600 hover:bg-gray-50' => !request()->routeIs('member.books.index'),
                ])>
                    <i class="fas fa-home text-sm"></i>
                    <span>Home</span>
                </a>


                <a href="{{ route('member.bookings.my') }}" 
                @class([
                    'flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                    'text-blue-600 bg-blue-600/10 border border-blue-600/20' => request()->routeIs('member.bookings.*'),
                    'text-gray-600 hover:text-blue-600 hover:bg-gray-50' => !request()->routeIs('member.bookings.*'),
                ])>
                    <i class="fas fa-bookmark text-sm"></i>
                    <span>My Bookings</span>
                </a>
            </nav>


            <!-- User Actions -->
            <div class="flex items-center space-x-3">
                <!-- Notifications -->
                <button class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                </button>

                <!-- User Menu -->
                <div class="relative">
                    <button class="flex items-center space-x-2 p-2 text-gray-700 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-gray-500 hidden sm:block"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-200 py-2 hidden">
                        <a href="#" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-user-circle"></i>
                            <span>Profile</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <hr class="my-2 border-gray-100">
                        <form action="{{ route('logout') }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-200">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" 
                        class="md:hidden p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-bars text-lg"></i>
                </button>

            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobileMenu" class="md:hidden border-t border-gray-200 bg-white ">
        <nav class="px-4 py-3 space-y-1">
            <a href="{{ route('member.books.index') }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-blue-600 bg-blue-600/10">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('member.books.index') }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-gray-50">
                <i class="fas fa-books"></i>
                <span>Books</span>
            </a>
            <a href="{{ route('member.bookings.my') }}" 
               class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-gray-50">
                <i class="fas fa-bookmark"></i>
                <span>My Bookings</span>
            </a>
        </nav>
    </div>
</header>
