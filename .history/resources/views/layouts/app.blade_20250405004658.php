<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
    <!-- Sticky Navbar -->
    <header class="bg-gray-900 shadow sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <!-- Left: Logo -->
            <div class="flex items-center gap-4">
                <a href="/" class="text-xl font-bold text-blue-400">🚀 MyProjects</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-6">
                <a href="#" class="text-gray-500 cursor-not-allowed">Current Project</a>
                <a href="/projects/create" class="text-sm font-medium hover:text-blue-400">Post a Project</a>
                <a href="/notifications" class="text-sm font-medium hover:text-blue-400">Notifications</a>
                <a href="/profile" class="text-sm font-medium hover:text-blue-400">
                    {{ Auth::user()->name }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-medium">
                        Logout
                    </button>
                </form>
            </div>

            <!-- Mobile Toggle Button -->
            <div class="md:hidden">
                <button id="mobile-menu-toggle" class="text-white hover:text-blue-400 focus:outline-none">
                    ☰
                </button>
            </div>
        </nav>

        <!-- Mobile Dropdown -->
        <div id="mobile-menu" class="md:hidden max-h-0 overflow-hidden transition-all duration-700 ease-in-out bg-gray-800 px-4" style="will-change: max-height;">
            <div class="pt-2 pb-4">
                <a href="#" class="block text-gray-500 py-1 cursor-not-allowed">Current Project</a>
                <a href="/projects/create" class="block text-sm font-medium hover:text-blue-400 py-1">Post a Project</a>
                <a href="/notifications" class="block text-sm font-medium hover:text-blue-400 py-1">Notifications</a>
                <a href="/profile" class="block text-sm font-medium hover:text-blue-400 py-1">
                    {{ Auth::user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm text-white bg-red-600 hover:bg-red-700 px-3 py-2 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        
    </header>

    <!-- Main Content -->
    <main class="min-h-screen py-6 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- JS for Mobile Toggle -->
    <script>
        const toggleBtn = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
    
        let isOpen = false;
    
        toggleBtn.addEventListener('click', () => {
            if (!isOpen) {
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-[500px]');
                isOpen = true;
            } else {
                mobileMenu.classList.remove('max-h-[500px]');
                mobileMenu.classList.add('max-h-0');
                isOpen = false;
            }
        });
    </script>
    
    @if(Auth::check())
    <div id="intro-welcome" class="fixed inset-0 bg-gradient-to-br from-black via-blue-900 to-black flex items-center justify-center z-50 text-white text-center text-3xl font-bold animate-fade-in">
        <p>👋 Welcome {{ Auth::user()->name }} to <span class="text-blue-400">Kobar</span>!</p>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const intro = document.getElementById('intro-welcome');
            setTimeout(() => {
                intro.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => intro.remove(), 1000);
            }, 6000);
        });
    </script>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
    </style>
@endif

</body>
</html>
