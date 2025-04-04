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
        <a href="#" class="hover:text-blue-400 transition duration-300">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
          </svg>
        </a>
        <a href="#" class="hover:text-blue-400 transition duration-300">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12c0-5.523-4.477-10-10-10z"/>
          </svg>
        </a>
        <a href="#" class="hover:text-blue-400 transition duration-300">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
          </svg>
        </a>
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