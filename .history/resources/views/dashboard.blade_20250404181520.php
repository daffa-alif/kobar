<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- React -->
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <!-- Babel for JSX -->
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200">
    <!-- Header with Navigation -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-indigo-600">
                {{ config('app.name', 'Dashboard') }}
            </a>
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300">
                    <i class="fas fa-briefcase mr-1"></i> Projects
                </a>
                <a href="{{ route('projects.create') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300">
                    <i class="fas fa-plus-circle mr-1"></i> Post Project
                </a>
                <a href="{{ route('profile.show') }}" class="text-gray-700 hover:text-indigo-600 transition duration-300">
                    <i class="fas fa-user mr-1"></i> Profile
                </a>
            </nav>
            <div class="flex items-center">
                <div class="mr-4">
                    <span class="text-sm text-gray-600">Welcome,</span>
                    <span class="font-medium text-gray-900">{{ auth()->user()->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded transition duration-300">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
                <button class="md:hidden ml-4 text-gray-500 hover:text-indigo-600" id="mobile-menu-button">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 py-3 bg-gray-50 border-t">
            <a href="{{ route('projects.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600">
                <i class="fas fa-briefcase mr-1"></i> Projects
            </a>
            <a href="{{ route('projects.create') }}" class="block py-2 text-gray-700 hover:text-indigo-600">
                <i class="fas fa-plus-circle mr-1"></i> Post Project
            </a>
            <a href="{{ route('profile.show') }}" class="block py-2 text-gray-700 hover:text-indigo-600">
                <i class="fas fa-user mr-1"></i> Profile
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Stats Overview -->
            <div class="col-span-2">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Dashboard Overview</h2>
                    <div id="stats-component"></div>
                </div>
            </div>

            <!-- User Profile Card -->
            <div class="col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 rounded-full bg-indigo-100 flex items-center justify-center mr-4">
                            @if(auth()->user()->profile_photo_path)
                                <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" alt="Profile" class="w-14 h-14 rounded-full object-cover">
                            @else
                                <span class="text-2xl font-bold text-indigo-500">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">{{ auth()->user()->name }}</h3>
                            <p class="text-gray-600 text-sm">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Member Since</span>
                            <span class="font-medium">{{ auth()->user()->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Projects</span>
                            <span class="font-medium">{{ auth()->user()->projects()->count() }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('profile.show') }}" class="block w-full py-2 px-4 bg-indigo-50 text-indigo-600 text-center rounded hover:bg-indigo-100 transition duration-300">
                            Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3D Canvas -->
            <div class="col-span-1 lg:col-span-3">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Project Visualization</h2>
                    <div id="three-js-container" class="w-full h-64 rounded bg-gray-100"></div>
                </div>
            </div>

            <!-- Recent Projects -->
            <div class="col-span-1 lg:col-span-3">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-gray-800">Recent Projects</h2>
                        <a href="{{ route('projects.index') }}" class="text-indigo-600 hover:text-indigo-800">View All</a>
                    </div>
                    <div id="projects-component"></div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 py-6 border-t">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-600">© {{ date('Y') }} {{ config('app.name', 'Dashboard') }}. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-github"></i></a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script type="text/babel">
        // Stats Component
        const StatsComponent = () => {
            const [stats, setStats] = React.useState({
                activeProjects: {{ auth()->user()->projects()->where('status', 'active')->count() }},
                completedProjects: {{ auth()->user()->projects()->where('status', 'completed')->count() }},
                pendingProjects: {{ auth()->user()->projects()->where('status', 'pending')->count() }}
            });

            return (
                <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div className="bg-blue-50 p-4 rounded-lg border border-blue-100">
                        <div className="flex items-center">
                            <div className="bg-blue-100 p-3 rounded-full">
                                <i className="fas fa-project-diagram text-blue-600"></i>
                            </div>
                            <div className="ml-4">
                                <h4 className="text-gray-500 text-sm">Active Projects</h4>
                                <p className="text-2xl font-bold text-gray-800">{stats.activeProjects}</p>
                            </div>
                        </div>
                    </div>
                    <div className="bg-green-50 p-4 rounded-lg border border-green-100">
                        <div className="flex items-center">
                            <div className="bg-green-100 p-3 rounded-full">
                                <i className="fas fa-check-circle text-green-600"></i>
                            </div>
                            <div className="ml-4">
                                <h4 className="text-gray-500 text-sm">Completed</h4>
                                <p className="text-2xl font-bold text-gray-800">{stats.completedProjects}</p>
                            </div>
                        </div>
                    </div>
                    <div className="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
                        <div className="flex items-center">
                            <div className="bg-yellow-100 p-3 rounded-full">
                                <i className="fas fa-clock text-yellow-600"></i>
                            </div>
                            <div className="ml-4">
                                <h4 className="text-gray-500 text-sm">Pending</h4>
                                <p className="text-2xl font-bold text-gray-800">{stats.pendingProjects}</p>
                            </div>
                        </div>
                    </div>
                </div>
            );
        };

        // Projects Component
        const ProjectsComponent = () => {
            const [projects, setProjects] = React.useState([
                @foreach(auth()->user()->projects()->latest()->take(5)->get() as $project)
                {
                    id: {{ $project->id }},
                    title: "{{ $project->title }}",
                    status: "{{ $project->status }}",
                    budget: "{{ $project->budget }}",
                    created_at: "{{ $project->created_at->diffForHumans() }}"
                },
                @endforeach
            ]);

            const getStatusColor = (status) => {
                switch(status) {
                    case 'active': return 'bg-green-100 text-green-800';
                    case 'pending': return 'bg-yellow-100 text-yellow-800';
                    case 'completed': return 'bg-blue-100 text-blue-800';
                    default: return 'bg-gray-100 text-gray-800';
                }
            };

            return (
                <div className="overflow-x-auto">
                    <table className="min-w-full divide-y divide-gray-200">
                        <thead className="bg-gray-50">
                            <tr>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Budget</th>
                                <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                <th className="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody className="bg-white divide-y divide-gray-200">
                            {projects.length > 0 ? (
                                projects.map(project => (
                                    <tr key={project.id}>
                                        <td className="px-6 py-4 whitespace-nowrap">
                                            <div className="text-sm font-medium text-gray-900">{project.title}</div>
                                        </td>
                                        <td className="px-6 py-4 whitespace-nowrap">
                                            <span className={`px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusColor(project.status)}`}>
                                                {project.status.charAt(0).toUpperCase() + project.status.slice(1)}
                                            </span>
                                        </td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{project.budget}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{project.created_at}</td>
                                        <td className="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href={`/projects/${project.id}`} className="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                            <a href={`/projects/${project.id}/edit`} className="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="5" className="px-6 py-4 text-center text-sm text-gray-500">No projects found</td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            );
        };

        // Render React Components
        ReactDOM.render(<StatsComponent />, document.getElementById('stats-component'));
        ReactDOM.render(<ProjectsComponent />, document.getElementById('projects-component'));
    </script>

    <!-- Three.js Script -->
    <script>
        // Initialize Three.js scene
        const initThreeJS = () => {
            const container = document.getElementById('three-js-container');
            const width = container.clientWidth;
            const height = container.clientHeight;

            // Create scene
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0xf5f5f5);

            // Create camera
            const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
            camera.position.z = 5;

            // Create renderer
            const renderer = new THREE.WebGLRenderer({ antialias: true });
            renderer.setSize(width, height);
            container.appendChild(renderer.domElement);

            // Create project bars (representing projects)
            const projectData = [
                @foreach(auth()->user()->projects()->get() as $index => $project)
                {
                    value: {{ $index + 1 }},
                    status: "{{ $project->status }}"
                },
                @endforeach
            ];

            // Create geometry based on project data
            const maxBars = Math.min(projectData.length, 10);
            for (let i = 0; i < maxBars; i++) {
                const height = projectData[i].value * 0.4;
                const geometry = new THREE.BoxGeometry(0.5, height, 0.5);
                
                // Set material color based on status
                let color;
                switch(projectData[i].status) {
                    case 'active': color = 0x4ade80; break; // green
                    case 'pending': color = 0xfacc15; break; // yellow
                    case 'completed': color = 0x60a5fa; break; // blue
                    default: color = 0x9ca3af; // gray
                }
                
                const material = new THREE.MeshStandardMaterial({ color });
                const bar = new THREE.Mesh(geometry, material);
                bar.position.x = i - (maxBars / 2) + 0.5;
                bar.position.y = height / 2;
                scene.add(bar);
            }

            // Add lights
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);

            const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
            directionalLight.position.set(1, 1, 1);
            scene.add(directionalLight);

            // Animation function
            const animate = () => {
                requestAnimationFrame(animate);
                scene.rotation.y += 0.005;
                renderer.render(scene, camera);
            };

            // Handle window resize
            window.addEventListener('resize', () => {
                const newWidth = container.clientWidth;
                const newHeight = container.clientHeight;
                camera.aspect = newWidth / newHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(newWidth, newHeight);
            });

            // Start animation
            animate();
        };

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Initialize Three.js after page load
        window.addEventListener('load', initThreeJS);
    </script>
</body>
</html>