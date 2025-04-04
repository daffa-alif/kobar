<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="p-8 bg-white rounded-lg shadow-md w-96">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Login to Your Account</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email Address" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <a href="" class="text-sm text-blue-600 hover:text-blue-800">Forgot password?</a>
            </div>
            
            <button type="submit" class="w-full p-3 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300">Login</button>
        </form>
        
        <div class="flex items-center my-6">
            <hr class="flex-1 border-gray-300">
            <span class="px-4 text-sm text-gray-500">OR CONTINUE WITH</span>
            <hr class="flex-1 border-gray-300">
        </div>
        
        <div class="grid grid-cols-3 gap-4 mb-6">
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <img src="{{ asset('storage/auth/google.png') }}" alt="Google" class="w-6 h-6" />
            </a>
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <img src="{{ asset('storage/auth/facebook.png') }}" alt="Facebook" class="w-6 h-6" />
            </a>
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v6/icons/github.svg" alt="GitHub" class="w-6 h-6" />
            </a>
        </div>
        
        <p class="text-center text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-800">Register</a>
        </p>
    </div>
</body>
</html>