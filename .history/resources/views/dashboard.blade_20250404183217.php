<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.21.2/babel.min.js"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <!-- ThreeJS Background Canvas -->
    <div id="three-background" class="fixed top-0 left-0 w-full h-full -z-10"></div>

    <!-- Main Content -->
    <div class="relative z-10">
        <!-- Top Navigation Bar -->
        <nav class="bg-gray-800 bg-opacity-80 backdrop-blur-sm border-b border-gray-700 px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-blue-400">WorkHub</div>
                    <div class="ml-10 flex space-x-6">
                        <button class="text-gray-300 hover:text-white transition-colors">Dashboard</button>
                        <button class="text-gray-300 hover:text-white transition-colors">Projects</button>
                        <button class="text-gray-300 hover:text-white transition-colors">Post a Project</button>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 bg-gray-700 rounded-lg px-3 py-2 hover:bg-gray-600 transition-colors">
                            <span class="h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <span class="text-sm font-medium">{{ auth()->user()->name[0] }}</span>
                            </span>
                            <span>{{ auth()->user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5 py-1 hidden">
                            <button class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 w-full text-left">Profile</button>
                            <button class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 w-full text-left">Settings</button>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700 w-full text-left">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Dashboard Content -->
        <div class="container mx-auto px-6 py-8">
            <div id="react-dashboard"></div>
        </div>
    </div>

    <!-- ThreeJS Animation Script -->
    <script>
        // Initialize ThreeJS scene
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('three-background').appendChild(renderer.domElement);
        
        // Create particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 2000;
        
        const posArray = new Float32Array(particlesCount * 3);
        for(let i = 0; i < particlesCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 5;
        }
        
        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        
        const particlesMaterial = new THREE.PointsMaterial({
            size: 0.005,
            color: 0x3b82f6,
            transparent: true,
            opacity: 0.8
        });
        
        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);
        
        // Camera position
        camera.position.z = 2;
        
        // Add ambient light
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);
        
        // Animation loop
        const animate = () => {
            requestAnimationFrame(animate);
            
            particlesMesh.rotation.x += 0.0003;
            particlesMesh.rotation.y += 0.0005;
            
            renderer.render(scene, camera);
        };
        
        animate();
        
        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>

    <!-- React Dashboard Components -->
    <script type="text/babel">
        // Project Card Component
        const ProjectCard = ({ title, description, progress, category, dueDate }) => {
            return (
                <div className="bg-gray-800 rounded-lg overflow-hidden shadow-lg border border-gray-700 hover:border-blue-500 transition-all">
                    <div className="px-6 py-4">
                        <div className="flex justify-between items-start">
                            <div className="font-bold text-xl mb-2 text-blue-400">{title}</div>
                            <span className="px-2 py-1 text-xs rounded-full bg-blue-900 text-blue-200">{category}</span>
                        </div>
                        <p className="text-gray-400 text-sm mb-4">{description}</p>
                        <div className="mb-2">
                            <div className="flex justify-between mb-1">
                                <span className="text-xs text-gray-400">Progress</span>
                                <span className="text-xs text-gray-400">{progress}%</span>
                            </div>
                            <div className="w-full bg-gray-700 rounded-full h-2">
                                <div className="bg-blue-500 h-2 rounded-full" style={{width: `${progress}%`}}></div>
                            </div>
                        </div>
                        <div className="flex justify-between items-center mt-4">
                            <div className="text-xs text-gray-400">Due: {dueDate}</div>
                            <button className="px-3 py-1 bg-blue-600 text-xs rounded hover:bg-blue-500 transition-colors">View Details</button>
                        </div>
                    </div>
                </div>
            );
        };

        // Stats Card Component
        const StatsCard = ({ title, value, icon, color }) => {
            return (
                <div className={`bg-gray-800 rounded-lg p-6 border-l-4 ${color} shadow-lg`}>
                    <div className="flex justify-between items-center">
                        <div>
                            <div className="text-gray-400 text-sm">{title}</div>
                            <div className="text-2xl font-bold mt-1">{value}</div>
                        </div>
                        <div className={`text-${color.split('-')[1]}-400`}>
                            {icon}
                        </div>
                    </div>
                </div>
            );
        };

        // Main Dashboard Component
        const Dashboard = () => {
            const projects = [
                { 
                    id: 1, 
                    title: "Website Redesign", 
                    description: "Complete overhaul of company website with new branding", 
                    progress: 75, 
                    category: "Design",
                    dueDate: "Apr 15, 2025"
                },
                { 
                    id: 2, 
                    title: "Mobile App Development", 
                    description: "Cross-platform app for customer engagement", 
                    progress: 30, 
                    category: "Development",
                    dueDate: "May 20, 2025"
                },
                { 
                    id: 3, 
                    title: "Marketing Campaign", 
                    description: "Q2 product launch campaign across all channels", 
                    progress: 60, 
                    category: "Marketing",
                    dueDate: "Apr 30, 2025"
                },
            ];

            return (
                <div className="space-y-8">
                    <div>
                        <h2 className="text-2xl font-bold mb-6">Dashboard Overview</h2>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <StatsCard 
                                title="Active Projects" 
                                value="12" 
                                icon={<svg xmlns="http://www.w3.org/2000/svg" className="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>}
                                color="border-blue-500"
                            />
                            <StatsCard 
                                title="Completed" 
                                value="24" 
                                icon={<svg xmlns="http://www.w3.org/2000/svg" className="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>}
                                color="border-green-500"
                            />
                            <StatsCard 
                                title="Pending" 
                                value="7" 
                                icon={<svg xmlns="http://www.w3.org/2000/svg" className="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>}
                                color="border-yellow-500"
                            />
                            <StatsCard 
                                title="Team Members" 
                                value="8" 
                                icon={<svg xmlns="http://www.w3.org/2000/svg" className="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>}
                                color="border-purple-500"
                            />
                        </div>
                    </div>

                    <div>
                        <div className="flex justify-between items-center mb-6">
                            <h2 className="text-2xl font-bold">Current Projects</h2>
                            <button className="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500 transition-colors flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                New Project
                            </button>
                        </div>
                        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            {projects.map(project => (
                                <ProjectCard 
                                    key={project.id}
                                    title={project.title}
                                    description={project.description}
                                    progress={project.progress}
                                    category={project.category}
                                    dueDate={project.dueDate}
                                />
                            ))}
                        </div>
                    </div>
                </div>
            );
        };

        // Render the React component
        ReactDOM.render(<Dashboard />, document.getElementById('react-dashboard'));
    </script>
</body>
</html>