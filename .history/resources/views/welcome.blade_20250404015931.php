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
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kobar - Freelance Programming Platform</title>
    
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
      
      /* Form styling */
      .form-input {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
      }
      
      .form-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
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
        const [showLoginForm, setShowLoginForm] = React.useState(false);
        const [showRegisterForm, setShowRegisterForm] = React.useState(false);
        
        const toggleMenu = () => {
          setShowMenu(!showMenu);
        };
        
        const toggleLoginForm = () => {
          setShowLoginForm(!showLoginForm);
          setShowRegisterForm(false);
        };
        
        const toggleRegisterForm = () => {
          setShowRegisterForm(!showRegisterForm);
          setShowLoginForm(false);
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
                <a href="#" className="text-gray-300 hover:text-blue-300 transition">About Us</a>
                <button onClick={toggleLoginForm} className="text-gray-300 hover:text-blue-300 transition">Login</button>
                <button onClick={toggleRegisterForm} className="text-gray-300 hover:text-blue-300 transition">Register</button>
              </div>
            </nav>
            
            {/* Mobile menu */}
            {showMenu && (
              <div className="md:hidden bg-gray-800 glass-card mt-2 rounded-lg p-4 mx-4">
                <a href="#" className="block py-2 text-blue-300 hover:text-blue-100">Home</a>
                <a href="#" className="block py-2 text-gray-300 hover:text-blue-300">About Us</a>
                <button onClick={toggleLoginForm} className="block w-full text-left py-2 text-gray-300 hover:text-blue-300">Login</button>
                <button onClick={toggleRegisterForm} className="block w-full text-left py-2 text-gray-300 hover:text-blue-300">Register</button>
              </div>
            )}
            
            {/* Login Form */}
            {showLoginForm && (
              <div className="fixed inset-0 flex items-center justify-center z-50 p-4" style={{ background: 'rgba(0,0,0,0.7)' }}>
                <div className="glass-card rounded-xl p-8 max-w-md w-full">
                  <div className="flex justify-between items-center mb-6">
                    <h2 className="text-2xl font-bold text-blue-100">Login</h2>
                    <button onClick={toggleLoginForm} className="text-gray-400 hover:text-white">
                      <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                    </button>
                  </div>
                  <form>
                    <div className="mb-4">
                      <label className="block text-blue-200 mb-2">Email</label>
                      <input type="email" className="w-full p-3 rounded-lg form-input" placeholder="your@email.com" />
                    </div>
                    <div className="mb-6">
                      <label className="block text-blue-200 mb-2">Password</label>
                      <input type="password" className="w-full p-3 rounded-lg form-input" placeholder="••••••••" />
                    </div>
                    <button type="submit" className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                      Sign In
                    </button>
                    <div className="mt-4 text-center text-gray-400">
                      <p>Don't have an account? <button onClick={toggleRegisterForm} className="text-blue-400 hover:text-blue-300">Register</button></p>
                    </div>
                  </form>
                </div>
              </div>
            )}
            
            {/* Register Form */}
            {showRegisterForm && (
              <div className="fixed inset-0 flex items-center justify-center z-50 p-4" style={{ background: 'rgba(0,0,0,0.7)' }}>
                <div className="glass-card rounded-xl p-8 max-w-md w-full">
                  <div className="flex justify-between items-center mb-6">
                    <h2 className="text-2xl font-bold text-blue-100">Create Account</h2>
                    <button onClick={toggleRegisterForm} className="text-gray-400 hover:text-white">
                      <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                    </button>
                  </div>
                  <form>
                    <div className="mb-4">
                      <label className="block text-blue-200 mb-2">Full Name</label>
                      <input type="text" className="w-full p-3 rounded-lg form-input" placeholder="John Doe" />
                    </div>
                    <div className="mb-4">
                      <label className="block text-blue-200 mb-2">Email</label>
                      <input type="email" className="w-full p-3 rounded-lg form-input" placeholder="your@email.com" />
                    </div>
                    <div className="mb-4">
                      <label className="block text-blue-200 mb-2">Password</label>
                      <input type="password" className="w-full p-3 rounded-lg form-input" placeholder="••••••••" />
                    </div>
                    <div className="mb-6">
                      <label className="block text-blue-200 mb-2">Account Type</label>
                      <select className="w-full p-3 rounded-lg form-input">
                        <option value="client">Client (Hiring)</option>
                        <option value="freelancer">Freelancer (Developer)</option>
                      </select>
                    </div>
                    <button type="submit" className="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition">
                      Create Account
                    </button>
                    <div className="mt-4 text-center text-gray-400">
                      <p>Already have an account? <button onClick={toggleLoginForm} className="text-blue-400 hover:text-blue-300">Login</button></p>
                    </div>
                  </form>
                </div>
              </div>
            )}
            
            {/* Hero Section */}
            <div className="px-6 py-20 md:py-32 max-w-6xl mx-auto">
              <div className="glass-card rounded-xl p-8 md:p-12">
                <h1 className="text-4xl md:text-6xl font-bold text-blue-100 mb-6">
                  Connect with <span className="text-blue-400">Global</span> Talent
                </h1>
                <p className="text-xl text-gray-300 mb-8 max-w-2xl">
                  Kobar brings together programmers, freelancers, and clients from around the world in a secure, decentralized platform.
                </p>
                <div className="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                  <button onClick={toggleRegisterForm} className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
                    Join as Freelancer
                  </button>
                  <button onClick={toggleRegisterForm} className="bg-transparent border border-blue-400 text-blue-400 hover:text-blue-100 hover:border-blue-300 font-semibold py-3 px-6 rounded-lg transition transform hover:scale-105">
                    Hire Talent
                  </button>
                </div>
              </div>
            </div>
            
            {/* About Us Section */}
            <div className="px-6 py-16 max-w-6xl mx-auto">
              <h2 className="text-3xl font-bold text-center text-blue-300 mb-12">About Us</h2>
              
              <div className="glass-card rounded-xl p-8 mb-12">
                <p className="text-xl text-gray-300 mb-6">
                  Kobar is a platform provider for programmers, freelancers, and for those who need their services. We work around the globe for anyone that wants to work with us.
                </p>
                <p className="text-xl text-gray-300 mb-6">
                  The payment method uses an escrow system, with trusted admins as the third-party payment intermediaries to prevent money or project scams.
                </p>
                <h3 className="text-2xl font-bold text-blue-200 mb-4">Benefits of Kobar</h3>
                <ul className="list-disc pl-6 mb-6 space-y-2 text-gray-300">
                  <li>Decentralized platform offering more freedom and flexibility</li>
                  <li>Secure escrow payment system protecting both clients and freelancers</li>
                  <li>Global talent pool with diverse programming skills</li>
                  <li>Transparent project management and communication</li>
                  <li>Lower fees compared to traditional freelance platforms</li>
                </ul>
                <h3 className="text-2xl font-bold text-blue-200 mb-4">Current Limitations</h3>
                <ul className="list-disc pl-6 text-gray-300 space-y-2">
                  <li>This platform is still new and in active development</li>
                  <li>Additional features and improvements will be released soon</li>
                  <li>Growing community - more talent joining every day</li>
                  <li>Interface and user experience updates are planned</li>
                </ul>
              </div>
            </div>
            
            {/* How It Works Section */}
            <div className="px-6 py-16 max-w-6xl mx-auto">
              <h2 className="text-3xl font-bold text-center text-blue-300 mb-12">How It Works</h2>
              
              <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                {/* Client */}
                <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                  <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <h3 className="text-xl font-semibold text-blue-100 mb-2">For Clients</h3>
                  <ol className="text-gray-300 list-decimal pl-5 space-y-2">
                    <li>Post your project with detailed requirements</li>
                    <li>Review proposals from qualified developers</li>
                    <li>Funds are held in secure escrow</li>
                    <li>Approve work and release payment</li>
                  </ol>
                </div>
                
                {/* Freelancers */}
                <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                  <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                  <h3 className="text-xl font-semibold text-blue-100 mb-2">For Freelancers</h3>
                  <ol className="text-gray-300 list-decimal pl-5 space-y-2">
                    <li>Create your profile highlighting skills</li>
                    <li>Browse and bid on relevant projects</li>
                    <li>Deliver quality work on schedule</li>
                    <li>Receive secure payment through escrow</li>
                  </ol>
                </div>
                
                {/* Escrow */}
                <div className="glass-card rounded-xl p-6 transform transition hover:scale-105">
                  <svg className="h-12 w-12 text-blue-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                  <h3 className="text-xl font-semibold text-blue-100 mb-2">Escrow Protection</h3>
                  <ul className="text-gray-300 list-disc pl-5 space-y-2">
                    <li>Client deposits funds before work begins</li>
                    <li>Trusted admins oversee transactions</li>
                    <li>Payments released only after approval</li>
                    <li>Dispute resolution if needed</li>
                  </ul>
                </div>
              </div>
            </div>
            
            {/* CTA Section */}
            <div className="px-6 py-16 max-w-4xl mx-auto text-center">
              <div className="glass-card rounded-xl p-8 md:p-12">
                <h2 className="text-3xl font-bold text-blue-100 mb-6">Ready to Get Started?</h2>
                <p className="text-xl text-gray-300 mb-8">
                  Join our growing community of freelancers and clients from around the world.
                </p>
                <button onClick={toggleRegisterForm} className="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition transform hover:scale-105">
                  Create Free Account
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
                      A decentralized platform connecting programmers and clients globally.
                    </p>
                  </div>
                  
                  <div>
                    <h3 className="text-lg font-semibold text-white mb-4">For Clients</h3>
                    <ul className="space-y-2 text-gray-400">
                      <li><a href="#" className="hover:text-blue-300">How to Hire</a></li>
                      <li><a href="#" className="hover:text-blue-300">Post a Project</a></li>
                      <li><a href="#" className="hover:text-blue-300">Payment Protection</a></li>
                      <li><a href="#" className="hover:text-blue-300">Find Developers</a></li>
                    </ul>
                  </div>
                  
                  <div>
                    <h3 className="text-lg font-semibold text-white mb-4">For Freelancers</h3>
                    <ul className="space-y-2 text-gray-400">
                      <li><a href="#" className="hover:text-blue-300">Find Work</a></li>
                      <li><a href="#" className="hover:text-blue-300">Create Profile</a></li>
                      <li><a href="#" className="hover:text-blue-300">Payment Methods</a></li>
                      <li><a href="#" className="hover:text-blue-300">Community</a></li>
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