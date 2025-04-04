<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAAnFBMVEVHcEzqQzXqQjXqQzXqQzXqQzXrRzPqRDTqQzXqQzXqQzXqQzXqOzbqQzX8vQPziCL7vAX8vAT3pRX7vAXsVzD7vAVChfRChfRChPRChfRChfT7vAVBhvJChfQ8m5BChfRChfRYq0wxqFPXuCEzqFKqsjUZp1Y0qFM9qVFDg/o0qFM0qFMzqFA8lLxDg/1ChfQ0qFM0qFMzqFE3onsP391uAAAAM3RSTlMAOYXD7f9hFN+ZWlX/bev/Mv//hv/CnZMe/0jGX2US7Nf/j//////KXoPe/DD//7+57UCtLMrnAAAA5ElEQVR4AX3QAxbEQBBF0T+2rdjG/vc23RXj5MZ5YaM0Gk+ms9l0Mh6hbc5CYTpH3WI5a1guUBrNOhYDbVw+c1aYrFaTZkPxvjXIpt7mW0oTlHYo7Q/bonUcT6fzbDtDr8uJuY7R63biit+6Pyr3J/a87ZF71b1x4j698TsUf0OP/eYfJIBAlIiYv5N+RVbQcKco8EFQNU1DAzURwF43WDS7N94BWLw1qv0iTzAORde1QDzTD3gLwQlaIVKUKGZbqgJIwu7TGlL+HyhqxxclwWne7Caos+JaU9DmKWbsurGpVHf9AR6XJvBaxWh+AAAAAElFTkSuQmCC" alt="Google" class="w-6 h-6" />
            </a>
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v6/icons/facebook.svg" alt="Facebook" class="w-6 h-6" />
            </a>
            <a href="#" class="flex items-center justify-center p-3 border border-gray-300 rounded-md hover:bg-gray-50 transition duration-300">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v6/icons/github.svg" alt="GitHub" class="w-6 h-6" />
            </a>
        </div>
        
        <p class="text-center text-gray-600">
            Already have an account? 
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-800">Login</a>
        </p>
    </div>
</body>
</html>