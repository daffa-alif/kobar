<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="p-8 bg-white rounded-lg shadow-md w-96">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Create an Account</h2>
        
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" placeholder="Full Name" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" required>
            </div>
            
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email Address" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}" required>
            </div>
            
            <div class="mb-4">
                <input type="password" name="password" placeholder="Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div class="mb-6">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <button type="submit" class="w-full p-3 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300">Register</button>
        </form>
        
        <div class="flex items-center my-6">
            <hr class="flex-1 border-gray-300">
            <span class="px-4 text-sm text-gray-500">OR CONTINUE WITH</span>
            <hr class="flex-1 border-gray-300">
        </div>
        
        <div class="grid grid-cols-3 gap-4 mb-6">
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="#EA4335" d="M12 5.9c1.6 0 3 .6 4.1 1.4l2.8-2.8C17.1 3.1 14.7 2 12 2 8.1 2 4.8 4.2 3.2 7.5l3.3 2.6C7.5 7.4 9.6 5.9 12 5.9z"/>
                    <path fill="#4285F4" d="M23.5 12.2c0-.8-.1-1.6-.2-2.4H12v4.5h6.4c-.3 1.4-1.1 2.6-2.3 3.4v2.8h3.7c2.2-2 3.4-4.9 3.4-8.3z"/>
                    <path fill="#FBBC05" d="M6.5 14.1l-3.3 2.6C4.7 19.8 8.1 22 12 22c3.2 0 5.9-1.1 7.8-2.9l-3.7-2.8c-1 .7-2.3 1.1-4.1 1.1-2.4 0-4.5-1.6-5.2-3.8H6.5z"/>
                    <path fill="#34A853" d="M12 23c4.6 0 8.3-1.5 11-4.2l-5.5-4.3C15.9 15.7 14 16.4 12 16.4c-3.2 0-5.9-2.1-6.9-5l-5.3 4.1C2.8 19.8 7 23 12 23z"/>
                </svg>
            </a>
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="#1877F2" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.987 4.388 10.953 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.061 24 12.073z"/>
                </svg>
            </a>
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="#333" d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                </svg>
            </a>
        </div>
        
        <p class="text-center text-gray-600">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-800">Login</a>
        </p>
    </div>
</body>
</html>