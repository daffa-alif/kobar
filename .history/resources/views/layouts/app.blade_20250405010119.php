<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Three.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
</head>
<style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }
    
    #bg-canvas {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    
    .main {
        position: relative;
        min-height: 100vh;
        padding: 1.5rem 1rem;
        color: white;
        z-index: 1;
    }
    
    @media (min-width: 640px) {
        .main {
            padding: 1.5rem 1.5rem;
        }
    }
    
    @media (min-width: 1024px) {
        .main {
            padding: 2rem;
        }
    }
    
    .content {
        max-width: 1200px;
        margin: 0 auto;
        background-color: rgba(0, 0, 0, 0.2);
        padding: 2rem;
        border-radius: 0.5rem;
        backdrop-filter: blur(5px);
    }
</style>

<body class="bg-black text-white">
    <!-- Three.js Canvas -->
    <canvas id="bg-canvas"></canvas>
    
    <!-- Sticky Navbar -->
    <header class="bg-gray-900 bg-opacity-80 shadow sticky top-0 z-50 backdrop-filter backdrop-blur-sm">
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
        <div id="mobile-menu" class="md:hidden max-h-0 overflow-hidden transition-all duration-700 ease-in-out bg-gray-800 bg-opacity-90 backdrop-filter backdrop-blur-sm px-4" style="will-change: max-height;">
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
    <main class="main">
        <div class="content">
            @yield('content')
        </div>
    </main>
    
    <!-- Three.js Background Script -->
    <script>
        // Initialize Three.js
        const canvas = document.getElementById('bg-canvas');
        const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        
        // Create scene
        const scene = new THREE.Scene();
        
        // Create camera
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 30;
        
        // Create particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 1500;
        
        // Create positions array (x, y, z for each particle)
        const positions = new Float32Array(particlesCount * 3);
        const scales = new Float32Array(particlesCount);
        
        for (let i = 0; i < particlesCount; i++) {
            // Random positions within a sphere
            const i3 = i * 3;
            positions[i3] = (Math.random() - 0.5) * 100;
            positions[i3 + 1] = (Math.random() - 0.5) * 100;
            positions[i3 + 2] = (Math.random() - 0.5) * 100;
            
            // Random sizes
            scales[i] = Math.random() * 0.5 + 0.1;
        }
        
        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        particlesGeometry.setAttribute('scale', new THREE.BufferAttribute(scales, 1));
        
        // Create particle material
        const particlesMaterial = new THREE.PointsMaterial({
            color: 0x4299e1, // Tailwind blue-500
            size: 0.5,
            transparent: true,
            opacity: 0.8,
            blending: THREE.AdditiveBlending
        });
        
        // Create particles mesh
        const particles = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particles);
        
        // Create background gradient
        const bgGeometry = new THREE.PlaneGeometry(200, 100);
        const bgMaterial = new THREE.ShaderMaterial({
            uniforms: {
                time: { value: 0 },
                resolution: { value: new THREE.Vector2(window.innerWidth, window.innerHeight) }
            },
            vertexShader: `
                varying vec2 vUv;
                void main() {
                    vUv = uv;
                    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                }
            `,
            fragmentShader: `
                uniform float time;
                uniform vec2 resolution;
                varying vec2 vUv;
                
                vec3 colorA = vec3(0.01, 0.05, 0.2);  // very dark blue (almost black)
                vec3 colorB = vec3(0.05, 0.15, 0.35); // dark blue
                vec3 colorC = vec3(0.1, 0.3, 0.6);    // medium blue
                
                void main() {
                    vec2 st = vUv;
                    
                    // Animated gradient
                    float noise = sin(st.x * 10.0 + time * 0.1) * sin(st.y * 10.0 + time * 0.2) * 0.05;
                    st.y += noise;
                    
                    vec3 color = mix(colorA, colorB, st.y);
                    color = mix(color, colorC, st.x * st.y);
                    
                    // Add subtle pulsing
                    float pulse = sin(time * 0.2) * 0.05 + 0.95;
                    color *= pulse;
                    
                    gl_FragColor = vec4(color, 1.0);
                }
            `
        });
        
        const background = new THREE.Mesh(bgGeometry, bgMaterial);
        background.position.z = -50;
        scene.add(background);
        
        // Animation loop
        let lastTime = 0;
        function animate(time) {
            const currentTime = time * 0.001; // Convert to seconds
            const deltaTime = currentTime - lastTime;
            lastTime = currentTime;
            
            // Update uniforms
            bgMaterial.uniforms.time.value = currentTime;
            
            // Rotate particles
            particles.rotation.x += deltaTime * 0.05;
            particles.rotation.y += deltaTime * 0.08;
            
            // Move particles
            const positions = particlesGeometry.attributes.position.array;
            for (let i = 0; i < particlesCount; i++) {
                const i3 = i * 3;
                positions[i3 + 2] += deltaTime * (scales[i] + 0.1);
                
                // Reset particles that move too far
                if (positions[i3 + 2] > 50) {
                    positions[i3 + 2] = -50;
                }
            }
            particlesGeometry.attributes.position.needsUpdate = true;
            
            // Render
            renderer.render(scene, camera);
            requestAnimationFrame(animate);
        }
        
        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
            bgMaterial.uniforms.resolution.value.set(window.innerWidth, window.innerHeight);
        });
        
        // Start animation
        requestAnimationFrame(animate);
    </script>

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
    
    @if(Auth::check() && !session()->has('intro_shown'))
    @php session(['intro_shown' => true]); @endphp

    <div id="intro-welcome" class="fixed inset-0 bg-gradient-to-br from-black via-blue-900 to-black flex items-center justify-center z-50 text-white text-center text-3xl font-bold animate-fade-in">
        <p>👋 hello {{ Auth::user()->name }} <span class="text-blue-400">welcome to Kobar</span>!</p>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const intro = document.getElementById('intro-welcome');
            setTimeout(() => {
                intro.classList.add('opacity-0', 'pointer-events-none');
                setTimeout(() => intro.remove(), 1000);
            }, 3000);
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