<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.151.3/three.min.js"></script>
    <style>
        #bg-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <canvas id="bg-canvas"></canvas>
    
    <div class="p-8 bg-white bg-opacity-90 rounded-lg shadow-lg w-96 backdrop-blur-sm">
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
            Already have an account? 
            <a href="{{ route() }}" class="font-medium text-blue-600 hover:text-blue-800">Login</a>
        </p>
    </div>

    <script>
        // Initialize Three.js
        const canvas = document.getElementById('bg-canvas');
        const renderer = new THREE.WebGLRenderer({ canvas, antialias: true, alpha: false });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setClearColor(0x000000); // Set background to black
        
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
</body>
</html>