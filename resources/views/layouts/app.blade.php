<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-display antialiased">
    <!-- Navigation Header -->
        @include('partials.navbar-member')
        


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
                    <div class="w-16 h-16 bg-blue-600/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book-open text-blue-600 text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Welcome to LibraryHub</h2>
                    <p class="text-gray-600 mb-6">
                        Your modern library management system. Browse books, manage bookings, and explore our digital collection.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <button class="px-6 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors duration-200">
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
    @include('partials.footer-member')


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