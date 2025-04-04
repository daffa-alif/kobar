<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
</head>
<body class="p-6 bg-gray-100">
    <div id="root"></div>
    
    <script type="text/babel">
        function App() {
            React.useEffect(() => {
                const scene = new THREE.Scene();
                const camera = new THREE.PerspectiveCamera(75, window.innerWidth / 400, 0.1, 1000);
                const renderer = new THREE.WebGLRenderer();
                renderer.setSize(window.innerWidth, 400);
                document.getElementById("threejs-container").appendChild(renderer.domElement);
                
                const geometry = new THREE.BoxGeometry();
                const material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });
                const cube = new THREE.Mesh(geometry, material);
                scene.add(cube);
                
                camera.position.z = 5;
                
                function animate() {
                    requestAnimationFrame(animate);
                    cube.rotation.x += 0.01;
                    cube.rotation.y += 0.01;
                    renderer.render(scene, camera);
                }
                animate();
            }, []);
            
            return (
                <div>
                    <h2 className="text-xl font-bold">Welcome, {{ auth()->user()->name }}</h2>
                    <nav className="flex space-x-4 mt-4">
                        <a href="#" className="p-2 bg-blue-500 text-white rounded">Projects to Work</a>
                        <a href="#" className="p-2 bg-green-500 text-white rounded">Post a Project</a>
                        <a href="#" className="p-2 bg-gray-500 text-white rounded">Profile</a>
                    </nav>
                    <form action="{{ route('logout') }}" method="POST" className="mt-4">
                        @csrf
                        <button type="submit" className="p-2 text-white bg-red-500 rounded">Logout</button>
                    </form>
                    <div id="threejs-container" className="mt-6"></div>
                </div>
            );
        }
        
        ReactDOM.render(<App />, document.getElementById('root'));
    </script>
</body>
</html>
