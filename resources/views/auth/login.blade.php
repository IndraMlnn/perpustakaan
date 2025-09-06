<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ url('/login') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded focus:ring focus:ring-blue-200" required>
        </div>
        <div>
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border rounded focus:ring focus:ring-blue-200" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
            Login
        </button>
    </form>

    <p class="mt-4 text-center text-gray-600 text-sm">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
    </p>
</div>
</body>
</html>