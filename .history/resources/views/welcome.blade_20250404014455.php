<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kobar - Indonesia's Premium Provider</title>
  
  <!-- TailwindCSS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  
  <!-- React CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
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
            
            {/* Mobile menu button */}
            <div className="md:hidden">
              <button 
                onClick={toggleMenu}
                className="text-gray-300 hover:text-white focus:outline-none"
              >
                <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  {showMenu ? (
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                  ) : (
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"></path>
                  )}
                </svg>
              </button>
            </div>
            
            {/* Desktop Navigation */}
            <div className="hidden md:flex space-x-8">
              <a href="#" className="text-blue-300 hover:text-blue-100 transition">Home</a>
              <a href="#" className="text-gray-300 hover:text-blue-300 transition">Services</a>
              <a href="#" className="text-gray-300 hover:text-blue-300 transition">About</a>
              <a href="#" className="text-gray-300 hover:text-blue-300 transition">Projects</a>
              <a href="#" className="text-gray-300 hover:text-blue-300 transition">Contact</a>
            </div>
          </nav>
          
          {/* Mobile menu */}
          {showMenu && (
            <div className="md:hidden bg-gray-800 glass-card mt-2 rounded-lg p-4 mx-4">
              <a href="#" className="block py-2 text-blue-300 hover:text-blue-100">Home</a>
              <a href="#" className="block py-2 text-gray-300 hover:text-blue-300">Services</a>
              <a href="#" className="block py-2 text-gray-300 hover:text-blue-300">About</a>
              <a href="#" className="block py-2 text-gray-300 hover:text-blue-300">Projects</a>
              <a href="#" className="block py-2 text-gray-300 hover:text-blue-300">Contact</a>
            </div>
          )}
          
          {/* Hero Section */}
          <div className="px-6 py-20 md:py-32 max-w-6xl mx-auto">
            <div className="glass-card rounded-xl p-8 md:p-12">
              <h1 className="text-4xl md:text-6xl font-bold text-blue-100 mb-6">
                Innovating for a <span className="text-blue-400">Connected</span> Indonesia
              </h1>
              <p className="text-xl text-gray-300 mb-8 max-w-2xl">
                At Kobar, we're committed to building powerful solutions that drive businesses forward in the digital age.
              </p>
              <div className="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                <button className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
                  Our Services
                </button>
                <button className="bg-transparent border border-blue-400 text-blue-400 hover:text-blue-100 hover:border-blue-300 font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
                  Contact Us
                </button>
              </div>
            </div>
          </div>
          
          {/* Features Section */}
          <div className="px-6 py-16 max-w-6xl mx-auto">
            <h2 className="text-3xl font-bold text-center text-blue-300 mb-12">Our Expertise</h2>
            
            <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
              {/* Feature 1 */}
              <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <h3 className="text-xl font-semibold text-blue-100 mb-2">Data Analytics</h3>
                <p className="text-gray-300">Transform your raw data into actionable insights with our advanced analytics solutions.</p>
              </div>
              
              {/* Feature 2 */}
              <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
                <h3 className="text-xl font-semibold text-blue-100 mb-2">Cloud Solutions</h3>
                <p className="text-gray-300">Leverage scalable cloud infrastructure that grows with your business needs.</p>
              </div>
              
              {/* Feature 3 */}
              <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                </svg>
                <h3 className="text-xl font-semibold text-blue-100 mb-2">Cybersecurity</h3>
                <p className="text-gray-300">Protect your digital assets with our comprehensive security services and solutions.</p>
              </div>
            </div>
          </div>
          
          {/* CTA Section */}
          <div className="px-6 py-16 max-w-4xl mx-auto text-center">
            <div className="glass-card rounded-xl p-8 md:p-12">
              <h2 className="text-3xl font-bold text-blue-100 mb-6">Ready to Transform Your Business?</h2>
              <p className="text-xl text-gray-300 mb-8">
                Join the leading companies in Indonesia who trust Kobar for their digital solutions.
              </p>
              <button className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition transform hover:scale-105">
                Get Started Today
              </button>
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
  </script>
</body>
</html>