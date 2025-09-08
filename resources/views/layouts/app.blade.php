<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e40af',
                        secondary: '#64748b',
                        accent: '#f59e0b'
                    },
                    fontFamily: {
                        'display': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-display antialiased">
    <!-- Navigation Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50 backdrop-blur-sm bg-white/95">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo and Brand -->
                <div class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 bg-primary rounded-xl">
                        <i class="fas fa-book-open text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">LibraryHub</h1>
                        <p class="text-xs text-gray-500 hidden sm:block">Management System</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('member.dashboard') }}" 
                       class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 text-primary bg-primary/10 border border-primary/20">
                        <i class="fas fa-home text-sm"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('member.books.index') }}" 
                       class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 text-gray-600 hover:text-primary hover:bg-gray-50">
                        <i class="fas fa-books text-sm"></i>
                        <span>Books</span>
                    </a>
                    <a href="{{ route('member.bookings.my') }}" 
                       class="flex items-center space-x-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 text-gray-600 hover:text-primary hover:bg-gray-50">
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
                            <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
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
                    <button class="md:hidden p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden border-t border-gray-200 bg-white">
            <nav class="px-4 py-3 space-y-1">
                <a href="{{ route('member.dashboard') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-primary bg-primary/10">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('member.books.index') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-600">
                    <i class="fas fa-books"></i>
                    <span>Books</span>
                </a>
                <a href="{{ route('member.bookings.my') }}" 
                   class="flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-600">
                    <i class="fas fa-bookmark"></i>
                    <span>My Bookings</span>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2 text-sm text-gray-500">
                <li><a href="#" class="hover:text-primary transition-colors duration-200">Home</a></li>
                <li><i class="fas fa-chevron-right text-xs"></i></li>
                <li class="text-gray-900 font-medium">Dashboard</li>
            </ol>
        </nav>

        <!-- Content Area -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
            @yield('content')
            
            <!-- Demo Content -->
            <div class="text-center py-12">
                <div class="max-w-md mx-auto">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book-open text-primary text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome to LibraryHub</h2>
                    <p class="text-gray-600 mb-6">Your modern library management system. Browse books, manage bookings, and explore our digital collection.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <button class="px-6 py-3 bg-primary text-white rounded-lg font-medium hover:bg-primary/90 transition-colors duration-200">
                            Browse Books
                        </button>
                        <button class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition-colors duration-200">
                            View Bookings
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-2 mb-4 md:mb-0">
                    <div class="w-6 h-6 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-book-open text-white text-xs"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-700">LibraryHub</span>
                </div>
                <div class="text-sm text-gray-500">
                    © 2024 Library Management System. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Simple dropdown toggle
        document.addEventListener('DOMContentLoaded', function() {
            const userButton = document.querySelector('.relative button');
            const dropdown = document.querySelector('.absolute.right-0');
            
            if (userButton && dropdown) {
                userButton.addEventListener('click', function() {
                    dropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userButton.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>