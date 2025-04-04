<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- React CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/18.2.0/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/18.2.0/umd/react-dom.production.min.js"></script>
    <!-- Three.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.157.0/three.min.js"></script>
    <!-- Babel for JSX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/7.23.2/babel.min.js"></script>
</head>
<body class="min-h-screen bg-gray-100">
    <!-- Blade Header Section -->
    <div class="p-6 bg-white shadow">
        <h2 class="text-xl font-bold">Welcome, {{ auth()->user()->name }}</h2>
        <form action="{{ route('logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600 transition">Logout</button>
        </form>
    </div>

    <!-- React App Mount Point -->
    <div id="app"></div>

    <script type="text/babel">
        // Main App Component
        const App = () => {
            const [activeTab, setActiveTab] = React.useState('dashboard');
            const [mounted, setMounted] = React.useState(false);
            
            React.useEffect(() => {
                setMounted(true);
                
                // Initialize Three.js background on mount
                if (activeTab === 'dashboard') {
                    initThreeJsBackground();
                }
            }, []);
            
            React.useEffect(() => {
                if (mounted && activeTab === 'dashboard') {
                    initThreeJsBackground();
                }
            }, [activeTab]);
            
            const initThreeJsBackground = () => {
                const canvas = document.getElementById('bg-canvas');
                if (!canvas) return;
                
                // Clear any existing scene
                while (canvas.firstChild) {
                    canvas.removeChild(canvas.firstChild);
                }
                
                const scene = new THREE.Scene();
                const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
                
                renderer.setSize(window.innerWidth, window.innerHeight);
                renderer.setPixelRatio(window.devicePixelRatio);
                canvas.appendChild(renderer.domElement);
                
                // Create particles
                const particlesGeometry = new THREE.BufferGeometry();
                const particlesCount = 1000;
                
                const posArray = new Float32Array(particlesCount * 3);
                
                for (let i = 0; i < particlesCount * 3; i++) {
                    posArray[i] = (Math.random() - 0.5) * 5;
                }
                
                particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
                
                const particlesMaterial = new THREE.PointsMaterial({
                    size: 0.005,
                    color: 0x5A67D8
                });
                
                const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
                scene.add(particlesMesh);
                
                camera.position.z = 2;
                
                // Responsive handler
                window.addEventListener('resize', () => {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize(window.innerWidth, window.innerHeight);
                });
                
                // Animation loop
                const animate = () => {
                    requestAnimationFrame(animate);
                    particlesMesh.rotation.x += 0.001;
                    particlesMesh.rotation.y += 0.001;
                    renderer.render(scene, camera);
                };
                
                animate();
            };
            
            const renderContent = () => {
                switch (activeTab) {
                    case 'dashboard':
                        return <Dashboard />;
                    case 'projects':
                        return <ProjectsToWork />;
                    case 'post-project':
                        return <PostProject />;
                    case 'profile':
                        return <Profile />;
                    default:
                        return <Dashboard />;
                }
            };
            
            return (
                <div className="relative min-h-screen">
                    {activeTab === 'dashboard' && (
                        <div id="bg-canvas" className="fixed inset-0 -z-10"></div>
                    )}
                    
                    <nav className="bg-white shadow">
                        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div className="flex justify-between h-16">
                                <div className="flex">
                                    <div className="flex-shrink-0 flex items-center">
                                        <span className="text-xl font-bold text-indigo-600">WorkBoard</span>
                                    </div>
                                    <div className="hidden sm:ml-6 sm:flex sm:space-x-8">
                                        <NavItem 
                                            title="Dashboard" 
                                            active={activeTab === 'dashboard'}
                                            onClick={() => setActiveTab('dashboard')}
                                        />
                                        <NavItem 
                                            title="Projects to Work" 
                                            active={activeTab === 'projects'}
                                            onClick={() => setActiveTab('projects')}
                                        />
                                        <NavItem 
                                            title="Post a Project" 
                                            active={activeTab === 'post-project'}
                                            onClick={() => setActiveTab('post-project')}
                                        />
                                        <NavItem 
                                            title="Profile" 
                                            active={activeTab === 'profile'}
                                            onClick={() => setActiveTab('profile')}
                                        />
                                    </div>
                                </div>
                                <div className="hidden sm:ml-6 sm:flex sm:items-center">
                                    <button className="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <span className="sr-only">View notifications</span>
                                        <svg className="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </button>
                                </div>
                                <div className="-mr-2 flex items-center sm:hidden">
                                    <button type="button" className="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                                        <span className="sr-only">Open main menu</span>
                                        <svg className="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </nav>
                    
                    <main className="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                        {renderContent()}
                    </main>
                </div>
            );
        };
        
        const NavItem = ({ title, active, onClick }) => {
            const baseClasses = "inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium";
            const activeClasses = active 
                ? "border-indigo-500 text-gray-900" 
                : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700";
            
            return (
                <button 
                    className={`${baseClasses} ${activeClasses}`}
                    onClick={onClick}
                >
                    {title}
                </button>
            );
        };
        
        const Dashboard = () => (
            <div className="bg-white rounded-lg shadow p-6 backdrop-blur-sm bg-opacity-80">
                <h2 className="text-2xl font-bold text-gray-900 mb-4">Dashboard</h2>
                
                <div className="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div className="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div className="p-5">
                            <div className="flex items-center">
                                <div className="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                    <svg className="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div className="ml-5 w-0 flex-1">
                                    <dt className="text-sm font-medium text-gray-500 truncate">
                                        Active Projects
                                    </dt>
                                    <dd className="flex items-baseline">
                                        <div className="text-2xl font-semibold text-gray-900">
                                            12
                                        </div>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div className="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div className="p-5">
                            <div className="flex items-center">
                                <div className="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                    <svg className="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div className="ml-5 w-0 flex-1">
                                    <dt className="text-sm font-medium text-gray-500 truncate">
                                        Pending Proposals
                                    </dt>
                                    <dd className="flex items-baseline">
                                        <div className="text-2xl font-semibold text-gray-900">
                                            4
                                        </div>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div className="bg-indigo-50 overflow-hidden shadow rounded-lg">
                        <div className="p-5">
                            <div className="flex items-center">
                                <div className="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                    <svg className="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div className="ml-5 w-0 flex-1">
                                    <dt className="text-sm font-medium text-gray-500 truncate">
                                        Earnings
                                    </dt>
                                    <dd className="flex items-baseline">
                                        <div className="text-2xl font-semibold text-gray-900">
                                            $2,450
                                        </div>
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div className="mt-8">
                    <h3 className="text-lg font-medium text-gray-900">Recent Activity</h3>
                    <div className="mt-2 bg-white shadow overflow-hidden sm:rounded-md">
                        <ul className="divide-y divide-gray-200">
                            <ActivityItem 
                                title="New comment on project: Web Design Overhaul"
                                time="2 hours ago"
                                icon={<svg className="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fillRule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clipRule="evenodd" /></svg>}
                            />
                            <ActivityItem 
                                title="Project completed: Mobile App Development"
                                time="Yesterday"
                                icon={<svg className="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fillRule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clipRule="evenodd" /></svg>}
                            />
                            <ActivityItem 
                                title="New proposal accepted: E-commerce Platform"
                                time="2 days ago"
                                icon={<svg className="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zm0 16a3 3 0 01-3-3h6a3 3 0 01-3 3z" /></svg>}
                            />
                        </ul>
                    </div>
                </div>
            </div>
        );
        
        const ActivityItem = ({ title, time, icon }) => (
            <li>
                <a href="#" className="block hover:bg-gray-50">
                    <div className="px-4 py-4 sm:px-6">
                        <div className="flex items-center justify-between">
                            <div className="flex items-center">
                                <div className="flex-shrink-0">
                                    {icon}
                                </div>
                                <div className="ml-3">
                                    <p className="text-sm font-medium text-gray-900 truncate">
                                        {title}
                                    </p>
                                    <p className="text-sm text-gray-500">
                                        {time}
                                    </p>
                                </div>
                            </div>
                            <div className="ml-2 flex-shrink-0 flex">
                                <svg className="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        );
        
        const ProjectsToWork = () => {
            const projects = [
                {
                    id: 1,
                    title: "E-commerce Website Development",
                    description: "Looking for an experienced developer to build a Shopify-based e-commerce platform with custom features.",
                    budget: "$3,000 - $5,000",
                    skills: ["React", "Shopify", "JavaScript", "UI/UX"],
                    postedDate: "2 days ago"
                },
                {
                    id: 2,
                    title: "Mobile App for Fitness Tracking",
                    description: "Need a React Native developer to create a fitness tracking app with social features and workout plans.",
                    budget: "$5,000 - $8,000",
                    skills: ["React Native", "Firebase", "UI Design", "Health API"],
                    postedDate: "5 days ago"
                },
                {
                    id: 3,
                    title: "SEO Optimization for Tech Blog",
                    description: "Looking for an SEO expert to optimize our tech blog and improve organic traffic.",
                    budget: "$1,000 - $2,000",
                    skills: ["SEO", "Content Strategy", "Analytics", "WordPress"],
                    postedDate: "1 week ago"
                }
            ];
            
            return (
                <div className="bg-white rounded-lg shadow-md overflow-hidden">
                    <div className="p-6 bg-white border-b border-gray-200">
                        <h2 className="text-2xl font-bold text-gray-900">Available Projects</h2>
                        <p className="mt-1 text-sm text-gray-500">Browse projects that match your skills and interests</p>
                    </div>
                    
                    <div className="bg-white shadow overflow-hidden sm:rounded-md">
                        <ul className="divide-y divide-gray-200">
                            {projects.map(project => (
                                <li key={project.id}>
                                    <div className="px-4 py-5 sm:px-6">
                                        <div className="flex items-center justify-between">
                                            <h3 className="text-lg font-medium leading-6 text-gray-900">{project.title}</h3>
                                            <p className="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {project.budget}
                                            </p>
                                        </div>
                                        <p className="mt-1 max-w-2xl text-sm text-gray-500">{project.description}</p>
                                        <div className="mt-4">
                                            <div className="flex flex-wrap">
                                                {project.skills.map((skill, idx) => (
                                                    <span key={idx} className="px-2 py-1 mr-2 mb-2 text-xs font-medium rounded bg-indigo-100 text-indigo-800">
                                                        {skill}
                                                    </span>
                                                ))}
                                            </div>
                                            <div className="mt-2 flex justify-between items-center">
                                                <span className="text-xs text-gray-500">Posted {project.postedDate}</span>
                                                <button className="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Apply Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            );
        };
        
        const PostProject = () => {
            return (
                <div className="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div className="px-4 py-5 sm:px-6">
                        <h3 className="text-lg leading-6 font-medium text-gray-900">Post a New Project</h3>
                        <p className="mt-1 max-w-2xl text-sm text-gray-500">Fill out the form below to post your project</p>
                    </div>
                    <div className="border-t border-gray-200">
                        <form className="p-6">
                            <div className="grid grid-cols-6 gap-6">
                                <div className="col-span-6 sm:col-span-4">
                                    <label htmlFor="project-title" className="block text-sm font-medium text-gray-700">Project Title</label>
                                    <input type="text" name="project-title" id="project-title" className="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                </div>
                                
                                <div className="col-span-6">
                                    <label htmlFor="project-description" className="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="project-description" name="project-description" rows="4" className="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                                
                                <div className="col-span-6 sm:col-span-3">
                                    <label htmlFor="category" className="block text-sm font-medium text-gray-700">Category</label>
                                    <select id="category" name="category" className="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option>Web Development</option>
                                        <option>Mobile Development</option>
                                        <option>Design</option>
                                        <option>Marketing</option>
                                        <option>Writing</option>
                                    </select>
                                </div>
                                
                                <div className="col-span-6 sm:col-span-3">
                                    <label htmlFor="budget" className="block text-sm font-medium text-gray-700">Budget</label>
                                    <div className="mt-1 relative rounded-md shadow-sm">
                                        <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span className="text-gray-500 sm:text-sm">$</span>
                                        </div>
                                        <input type="text" name="budget" id="budget" className="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" />
                                    </div>
                                </div>
                                
                                <div className="col-span-6">
                                    <label htmlFor="skills" className="block text-sm font-medium text-gray-700">Skills Required</label>
                                    <input type="text" name="skills" id="skills" className="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="e.g. React, Node.js, GraphQL" />
                                    <p className="mt-2 text-sm text-gray-500">Separate skills with commas</p>
                                </div>
                                
                                <div className="col-span-6">
                                    <label className="block text-sm font-medium text-gray-700">Attachments</label>
                                    <div className="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div className="space-y-1 text-center">
                                            <svg className="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" />
                                            </svg>
                                            <div className="flex text-sm text-gray-600">
                                                <label htmlFor="file-upload" className="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="file-upload" name="file-upload" type="file" className="sr-only" />
                                                </label>
                                                <p className="pl-1">or drag and drop</p>
                                            </div>
                                            <p className="text-xs text-gray-500">
                                                PNG, JPG, PDF up to 10MB
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div className="mt-6">
                                <button type="submit" className="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Post Project
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            );
        };
