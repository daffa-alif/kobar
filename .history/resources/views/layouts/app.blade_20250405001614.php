<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complex Navbar with TailwindCSS</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    .nav-dropdown {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease-in-out;
    }
    
    .nav-dropdown.open {
      max-height: 500px;
    }
  </style>
</head>
<body>
  <header class="bg-gray-800 text-white shadow-lg">
    <!-- Top bar with contact info -->
    <div class="hidden md:flex justify-between items-center px-4 py-2 bg-gray-900">
      <div class="flex items-center space-x-4">
        <span class="flex items-center">
          <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
          </svg>
          <span>+1 (888) 123-4567</span>
        </span>
        <span class="flex items-center">
          <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
          </svg>
          <span>contact@example.com</span>
        </span>
      </div>
      <div class="flex space-x-4">
       <form action="route {{ logout }}"></form>
      </div>
    </div>
    
    <!-- Main navbar - will be sticky -->
    <nav id="main-nav" class="sticky top-0 bg-gray-800 px-4 py-3 flex justify-between items-center">
      <div class="flex items-center">
        <a href="#" class="text-2xl font-bold text-white mr-6">
          Brand<span class="text-blue-400">Logo</span>
        </a>
        <div class="hidden md:flex space-x-6">
          <a href="#" class="text-white hover:text-blue-400 transition duration-300">Home</a>
          <div class="relative group">
            <button class="text-white hover:text-blue-400 flex items-center transition duration-300">
              Services
              <svg class="h-4 w-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">
              <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Web Development</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">UI/UX Design</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">App Development</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Digital Marketing</a>
              </div>
            </div>
          </div>
          <a href="#" class="text-white hover:text-blue-400 transition duration-300">Projects</a>
          <a href="#" class="text-white hover:text-blue-400 transition duration-300">About</a>
          <a href="#" class="text-white hover:text-blue-400 transition duration-300">Contact</a>
        </div>
      </div>
      
      <div class="flex items-center">
        <div class="hidden md:flex items-center">
          <div class="relative mr-4">
            <input type="text" placeholder="Search..." class="bg-gray-700 text-white rounded-full pl-10 pr-4 py-1 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
              <svg class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
              </svg>
            </div>
          </div>
          <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Get Started</a>
        </div>
        
        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="md:hidden text-gray-200 hover:text-white focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path id="menu-icon" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
    </nav>
    
    <!-- Mobile menu dropdown -->
    <div id="mobile-menu" class="nav-dropdown md:hidden bg-gray-800 shadow-lg">
      <div class="px-4 py-3 space-y-4">
        <a href="#" class="block text-white font-medium">Home</a>
        
        <div>
          <button id="mobile-services-button" class="flex items-center justify-between w-full text-white font-medium">
            Services
            <svg id="services-icon" class="h-4 w-4 transform transition duration-300" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
          <div id="mobile-services-dropdown" class="nav-dropdown pl-4 space-y-2 mt-2">
            <a href="#" class="block text-gray-300 hover:text-white">Web Development</a>
            <a href="#" class="block text-gray-300 hover:text-white">UI/UX Design</a>
            <a href="#" class="block text-gray-300 hover:text-white">App Development</a>
            <a href="#" class="block text-gray-300 hover:text-white">Digital Marketing</a>
          </div>
        </div>
        
        <a href="#" class="block text-white font-medium">Projects</a>
        <a href="#" class="block text-white font-medium">About</a>
        <a href="#" class="block text-white font-medium">Contact</a>
        
        <div class="pt-4">
          <div class="relative mb-4">
            <input type="text" placeholder="Search..." class="w-full bg-gray-700 text-white rounded-full pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
              <svg class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
              </svg>
            </div>
          </div>
          <a href="#" class="block text-center bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300">Get Started</a>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Page content for demonstration -->
  <div class="container mx-auto px-4 py-8">
   @yield('content')
  </div>
  
  <script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('open');
      menuIcon.classList.toggle('hidden');
      closeIcon.classList.toggle('hidden');
    });
    
    // Mobile services dropdown
    const mobileServicesButton = document.getElementById('mobile-services-button');
    const mobileServicesDropdown = document.getElementById('mobile-services-dropdown');
    const servicesIcon = document.getElementById('services-icon');
    
    mobileServicesButton.addEventListener('click', () => {
      mobileServicesDropdown.classList.toggle('open');
      servicesIcon.classList.toggle('rotate-180');
    });
  </script>
</body>
</html>