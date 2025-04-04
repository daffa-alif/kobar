<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form action="{{ route('register') }}" method="POST" class="p-6 bg-white rounded shadow-md w-96">
        @csrf
        <h2 class="mb-4 text-xl font-bold">Register</h2>

        <input type="text" name="name" placeholder="Name" class="w-full p-2 mb-2 border rounded" value="{{ old('name') }}" required>
        <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-2 border rounded" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-2 border rounded" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 mb-2 border rounded" required>

        <button type="submit" class="w-full p-2 mt-2 text-white bg-blue-500 rounded">Register</button>
        <p class="mt-2 text-center"><a href="{{ route('login') }}" class="text-blue-500">Already have an account? Login</a></p>
    </form>
</body>
</html>
