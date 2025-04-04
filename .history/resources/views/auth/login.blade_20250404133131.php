<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('login') }}" method="POST" class="p-6 bg-white rounded shadow-md w-96">
        @csrf
        <h2 class="mb-4 text-xl font-bold">Login</h2>

        <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-2 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-2 border rounded" required>

        <button type="submit" class="w-full p-2 mt-2 text-white bg-blue-500 rounded">Login</button>
        <p class="mt-2 text-center"><a href="{{ route('register') }}" class="text-blue-500">Don't have an account? Register</a></p>
    </form>
</body>
</html>
