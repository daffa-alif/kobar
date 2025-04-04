<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kobar - Indonesia's Premium Provider</title>
  
  <!-- TailwindCSS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  
  <!-- React CDN -->
  <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.18.13/babel.min.js"></script>
  
  <!-- Three.js for the globe -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.150.1/three.min.js"></script>
  
  <style>
    #globe-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      overflow: hidden;
    }
    
    /* Custom styling */
    .glass-card {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-gray-900 text-white min-h-screen">
  <!-- Globe background container -->
  <div id="globe-container"></div>
  
  <!-- Main content -->
  <div id="root"></div>
  
  <script type="text/babel">
    // React components
    const App = () => {
      const [showMenu, setShowMenu] = React.useState(false);
      
      const toggleMenu = () => {
        setShowMenu(!showMenu);
      };
      
      return (
        <div className="relative z-10">
          {/* Navigation */}
          <nav className="px-6 py-4 flex justify-between items-center">
            <div className="flex items-center">
              <svg className="h-10 w-10 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
              <span className="ml-3 text-2xl font-bold text-blue-400">KOBAR.CO.ID</span>
            </div>
            
            <!-- Navbar -->
<nav id="navbar" class="fixed top-0 left-0 w-full bg-gray-900 bg-opacity-90 px-6 py-4 z-50 transition-all">
  <div class="flex items-center justify-between max-w-6xl mx-auto">
    <!-- Logo -->
    <a href="#" class="text-xl font-bold text-blue-400">Kobar Team</a>

    <!-- Mobile menu button -->
    <div class="md:hidden">
      <button onclick="toggleMenu()" class="text-gray-300 hover:text-white focus:outline-none">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>

    <!-- Desktop Navigation -->
    <div class="hidden md:flex space-x-8">
      <a href="#" class="text-blue-300 hover:text-blue-100 transition">Home</a>
      <a href="#" class="text-gray-300 hover:text-blue-300 transition">Services</a>
      <a href="#" class="text-gray-300 hover:text-blue-300 transition">About</a>
      <a href="#" class="text-gray-300 hover:text-blue-300 transition">Projects</a>
      <a href="#" class="text-gray-300 hover:text-blue-300 transition">Contact</a>
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="hidden opacity-0 scale-95 md:hidden bg-gray-800 glass-card rounded-lg mx-4 p-4 mt-2 transition-all duration-300">
    <a href="#" class="block py-2 text-blue-300 hover:text-blue-100" onclick="toggleMenu()">Home</a>
    <a href="#" class="block py-2 text-gray-300 hover:text-blue-300" onclick="toggleMenu()">Services</a>
    <a href="#" class="block py-2 text-gray-300 hover:text-blue-300" onclick="toggleMenu()">About</a>
    <a href="#" class="block py-2 text-gray-300 hover:text-blue-300" onclick="toggleMenu()">Projects</a>
    <a href="#" class="block py-2 text-gray-300 hover:text-blue-300" onclick="toggleMenu()">Contact</a>
  </div>
</nav>


      
          
           {/* Hero Section */}
           <div className="px-6 py-20 md:py-32 max-w-6xl mx-auto">
            <div className="glass-card rounded-xl p-8 md:p-12">
              <h1 className="text-4xl md:text-6xl font-bold text-blue-100 mb-6">
                Connecting <span className="text-blue-400">Talent</span> Across the Globe
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl">
                Kobar is a platform provider for programmers, freelancers, and for those who need their services. We work around the globe for anyone that wants to work with us.
              </p>
              <div className="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <button className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
                  Find Talent
                </button>
                <button className="bg-transparent border border-blue-400 text-blue-400 hover:text-blue-100 hover:border-blue-300 font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
                  Join as Freelancer
                </button>
              </div>
            </div>
          </div>
          
         {/* About Us Section (formerly Features) */}
         <div className="px-6 py-16 max-w-6xl mx-auto">
            <h2 className="text-3xl font-bold text-center text-blue-300 mb-8">About Us</h2>
            
            <div className="glass-card rounded-xl p-8 md:p-12 mb-12">
              <p className="text-xl text-gray-300 mb-6">
                Kobar is a platform provider for programmers, freelancers, and for those who need their services. We work around the globe for anyone that wants to work with us.
              </p>
              <p className="text-xl text-gray-300 mb-6">
                The payment method is using an escrow system, so trusted admins act as the third-party payment individuals to prevent money or project scams.
              </p>
              <p className="text-xl text-gray-300">
                Kobar operates on a decentralized model, connecting talent and clients directly while providing security and support throughout the process.
              </p>
            </div>
            
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
              {/* Benefits */}
              <div className="glass-card rounded-xl p-6">
                <h3 className="text-2xl font-semibold text-blue-100 mb-4">Benefits at Kobar</h3>
                <ul className="space-y-3 text-gray-300">
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-green-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Secure escrow payment system</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-green-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Decentralized platform giving more control to users</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-green-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Global access to talent and opportunities</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-green-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Lower fees compared to traditional platforms</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-green-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Transparent project management tools</span>
                  </li>
                </ul>
              </div>
              
              {/* Current Status */}
              <div className="glass-card rounded-xl p-6">
                <h3 className="text-2xl font-semibold text-blue-100 mb-4">Current Status</h3>
                <p className="text-gray-300 mb-4">
                  Kobar is still new and will be updated very soon. We're actively working on:
                </p>
                <ul className="space-y-3 text-gray-300">
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-yellow-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Expanding our network of verified freelancers</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-yellow-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Enhancing our dispute resolution system</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-yellow-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Improving the user interface and experience</span>
                  </li>
                  <li className="flex items-start">
                    <svg className="h-6 w-6 text-yellow-400 mr-2 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                      <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>Adding more payment options and currencies</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          {/* Services Section */}
          <div className="px-6 py-16 max-w-6xl mx-auto">
            <h2 className="text-3xl font-bold text-center text-blue-300 mb-12">Our Services</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              {/* Service 1 */}
              <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
                <h3 className="text-xl font-semibold text-blue-100 mb-2">Web Development</h3>
                <p className="text-gray-300">Connect with skilled web developers for your next project, from simple websites to complex web applications.</p>
              </div>
              
              {/* Service 2 */}
              <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                <h3 className="text-xl font-semibold text-blue-100 mb-2">Mobile Apps</h3>
                <p className="text-gray-300">Find experienced mobile developers for iOS, Android, or cross-platform app development needs.</p>
              </div>
              
              {/* Service 3 */}
              <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                <h3 className="text-xl font-semibold text-blue-100 mb-2">AI & Machine Learning</h3>
                <p className="text-gray-300">Connect with AI specialists and data scientists for innovative solutions and intelligent applications.</p>
              </div>
            </div>
          </div>

          {/* Team Section */}
<div className="px-6 py-20 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-center text-white">
  <div className="max-w-3xl mx-auto">
    <h2 className="text-4xl font-extrabold text-blue-400 mb-6">Join Kobar Team</h2>
    <p className="text-lg text-gray-300 mb-8">
      Become part of Kobar Team, an exclusive development group working on innovative solutions.
    </p>
    <div className="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
      <button className="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-10 rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">
        Request to Join
      </button>
      <button className="bg-transparent border-2 border-blue-400 text-blue-400 hover:bg-blue-500 hover:text-white font-semibold py-3 px-10 rounded-full transition-all duration-300 transform hover:scale-105">
        Learn More
      </button>
    </div>
    <p className="text-gray-400 mt-8 text-sm">
      Already a member?{" "}
      <a href="/dashboard" className="text-blue-300 hover:text-blue-200 font-semibold underline">
        Go to Dashboard
      </a>
    </p>
  </div>
</div>

          
      {/* CTA Section */}
<div className="px-6 py-16 max-w-4xl mx-auto text-center">
  <div className="glass-card rounded-xl p-8 md:p-12">
    <h2 className="text-3xl font-bold text-blue-100 mb-6">Ready to Get Started?</h2>
    <p className="text-xl text-gray-300 mb-8">
      Join our growing community of freelancers and clients from around the world.
    </p>
    <div className="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
      <button className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition transform hover:scale-105">
        Register Now
      </button>
      <button className="bg-transparent border border-blue-400 text-blue-400 hover:text-blue-100 hover:border-blue-300 font-semibold py-3 px-8 rounded-lg transition transform hover:scale-105">
        Learn More
      </button>
    </div>
    <p className="text-gray-400 mt-6">
      Already have an account?{" "}
      <a href="/login" className="text-blue-400 hover:text-blue-300 font-semibold">
        Login here
      </a>
    </p>
  </div>
</div>

          
          {/* Footer */}
          <footer className="bg-gray-900 glass-card mt-16 py-12">
            <div className="max-w-6xl mx-auto px-6">
              <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                  <div className="flex items-center mb-6">
                    <svg className="h-8 w-8 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                      <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                    </svg>
                    <span className="ml-2 text-xl font-bold text-blue-400">KOBAR</span>
                  </div>
                  <p className="text-gray-400">
                    Leading innovation in Indonesia's digital landscape since 2015.
                  </p>
                </div>
                
                <div>
                  <h3 className="text-lg font-semibold text-white mb-4">Services</h3>
                  <ul className="space-y-2 text-gray-400">
                    <li><a href="#" className="hover:text-blue-300">Web Development</a></li>
                    <li><a href="#" className="hover:text-blue-300">Mobile Apps</a></li>
                    <li><a href="#" className="hover:text-blue-300">Cloud Solutions</a></li>
                    <li><a href="#" className="hover:text-blue-300">Cybersecurity</a></li>
                  </ul>
                </div>
                
                <div>
                  <h3 className="text-lg font-semibold text-white mb-4">Company</h3>
                  <ul className="space-y-2 text-gray-400">
                    <li><a href="#" className="hover:text-blue-300">About Us</a></li>
                    <li><a href="#" className="hover:text-blue-300">Our Team</a></li>
                    <li><a href="#" className="hover:text-blue-300">Careers</a></li>
                    <li><a href="#" className="hover:text-blue-300">Blog</a></li>
                  </ul>
                </div>
                
                <div>
                  <h3 className="text-lg font-semibold text-white mb-4">Contact</h3>
                  <ul className="space-y-2 text-gray-400">
                    <li>Jakarta, Indonesia</li>
                    <li>info@kobar.co.id</li>
                    <li>+62 21 123 4567</li>
                  </ul>
                </div>
              </div>
              
              <div className="border-t border-gray-800 mt-10 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p className="text-gray-500 mb-4 md:mb-0">&copy; 2025 Kobar.co.id. All rights reserved.</p>
                <div className="flex space-x-6">
                  <a href="#" className="text-gray-400 hover:text-blue-400">
                    <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                    </svg>
                  </a>
                  <a href="#" className="text-gray-400 hover:text-blue-400">
                    <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                    </svg>
                  </a>
                  <a href="#" className="text-gray-400 hover:text-blue-400">
                    <svg className="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </footer>
        </div>
      );
    };
    
    // Render React App
    ReactDOM.render(<App />, document.getElementById('root'));
    
    // Three.js Globe Animation
    const initGlobe = () => {
      const container = document.getElementById('globe-container');
      
      // Set up scene
      const scene = new THREE.Scene();
      const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
      const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
      
      renderer.setSize(window.innerWidth, window.innerHeight);
      renderer.setPixelRatio(window.devicePixelRatio);
      container.appendChild(renderer.domElement);
      
      // Create Earth
      const earthGeometry = new THREE.SphereGeometry(5, 32, 32);
      const earthMaterial = new THREE.MeshBasicMaterial();
      
      // Create wireframe material for the globe
      const wireframe = new THREE.WireframeGeometry(earthGeometry);
      const line = new THREE.LineSegments(wireframe);
      line.material.color.setHex(0x3b82f6); // Blue color matching the website theme
      line.material.transparent = true;
      line.material.opacity = 0.3;
      scene.add(line);
      
      // Position camera
      camera.position.z = 15;
      
      // Add ambient light
      const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
      scene.add(ambientLight);
      
      // Animation loop
      function animate() {
        requestAnimationFrame(animate);
        
        // Rotate the globe
        line.rotation.y += 0.002;
        line.rotation.x += 0.0005;
        
        renderer.render(scene, camera);
      }
      
      // Handle window resize
      window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
      });
      
      // Start animation
      animate();
    };
    
    // Initialize globe after page loads
    window.addEventListener('load', initGlobe);

    const toggleMenu = () => {
  const menu = document.getElementById("mobile-menu");
  menu.classList.toggle("hidden");
  menu.classList.toggle("opacity-100");
  menu.classList.toggle("scale-100");
};

window.addEventListener("scroll", () => {
  const navbar = document.getElementById("navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("shadow-lg", "backdrop-blur-md");
  } else {
    navbar.classList.remove("shadow-lg", "backdrop-blur-md");
  }
});

  </script>
</body>
</html>