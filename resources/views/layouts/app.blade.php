<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  
</head>
<body>
       <header class="bg-blue-600 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="font-bold text-lg">Library System</h1>
            <nav class="space-x-4">
                <a href="" class="hover:underline">Home</a>
                <a href="{{ route('member.books.index') }}" class="hover:underline">Books</a>
                <a href="{{ route('member.bookings.my') }}" class="hover:underline">My Bookings</a>
              <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Logout</button>
                </form>
            </nav>
        </div>
    </header>
       <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>