@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-white">🧩 Explore Posted Projects</h1>
        <p class="text-gray-400 text-sm mt-2">Discover amazing ideas shared by others in the community.</p>
    </div>

    <!-- Welcome Banner (only shown once after login) -->
    @if(session('show_welcome'))
    <div class="mb-10">
        <div class="bg-gray-900 rounded-xl p-6 shadow-lg">
            <h2 class="text-2xl font-semibold text-blue-400">Welcome to Kobar</h2>
            <p class="text-gray-300 mt-2">Here you can post your project, explore others, and propose to collaborate. Your journey starts now, {{ Auth::user()->name }}!</p>
        </div>
    </div>
    @endif

    @php
    $projects = [
        [
            'title' => 'Smart Home Dashboard',
            'description' => 'Control panel UI for managing IoT smart home devices with real-time monitoring and automation rules.',
            'posted_by' => 'Daffa Aliefiandy',
            'posted_at' => now()->subDays(3)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=3',
            'tags' => ['IoT', 'Dashboard', 'Tailwind', 'React'],
            'price' => 1500000
        ],
        [
            'title' => 'Warehouse Inventory System',
            'description' => 'Complete inventory management solution with barcode scanning and stock movement tracking.',
            'posted_by' => 'Putri Ayu',
            'posted_at' => now()->subDays(2)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=5',
            'tags' => ['PHP', 'MySQL', 'Barcode'],
            'price' => 2500000
        ],
        [
            'title' => 'E-learning Platform',
            'description' => 'Interactive online learning system with video courses, quizzes, and certification.',
            'posted_by' => 'Rizky Saputra',
            'posted_at' => now()->subDays(1)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=7',
            'tags' => ['Laravel', 'Livewire', 'Video'],
            'price' => 1800000
        ],
        [
            'title' => 'Crypto Portfolio Tracker',
            'description' => 'Real-time cryptocurrency portfolio tracker with price alerts and profit/loss calculations.',
            'posted_by' => 'Lina Mardiana',
            'posted_at' => now()->subHours(12)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=12',
            'tags' => ['Crypto', 'API', 'React', 'Web3'],
            'price' => 3200000
        ],
        [
            'title' => 'Health Fitness App',
            'description' => 'Mobile application for workout tracking, meal planning, and health progress monitoring.',
            'posted_by' => 'Ahmad Fauzi',
            'posted_at' => now()->subHours(6)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=9',
            'tags' => ['Flutter', 'Firebase', 'Health'],
            'price' => 2100000
        ],
        [
            'title' => 'Restaurant POS System',
            'description' => 'Point of Sale system for restaurants with table management and kitchen display.',
            'posted_by' => 'Siti Rahayu',
            'posted_at' => now()->subHours(3)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=15',
            'tags' => ['Node.js', 'POS', 'Thermal Print'],
            'price' => 2750000
        ],
        [
            'title' => 'AI Content Generator',
            'description' => 'GPT-3 powered content creation tool for blogs, social media, and marketing copy.',
            'posted_by' => 'Budi Santoso',
            'posted_at' => now()->subHours(1)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=20',
            'tags' => ['AI', 'Python', 'OpenAI'],
            'price' => 4200000
        ],
        [
            'title' => 'Car Rental Platform',
            'description' => 'Online platform for renting vehicles with availability calendar and payment gateway.',
            'posted_by' => 'Dewi Anggraeni',
            'posted_at' => now()->subMinutes(45)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=25',
            'tags' => ['Laravel', 'Vue', 'Midtrans'],
            'price' => 3800000
        ],
        [
            'title' => 'AR Furniture App',
            'description' => 'Augmented Reality application to visualize furniture in your home before purchasing.',
            'posted_by' => 'Eko Prasetyo',
            'posted_at' => now()->subMinutes(30)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=30',
            'tags' => ['ARKit', '3D', 'iOS'],
            'price' => 5100000
        ],
        [
            'title' => 'Social Media Analytics',
            'description' => 'Dashboard to track engagement metrics across multiple social platforms in one place.',
            'posted_by' => 'Fitriani Wulandari',
            'posted_at' => now()->subMinutes(15)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=35',
            'tags' => ['API', 'DataViz', 'Twitter'],
            'price' => 2900000
        ],
        [
            'title' => 'Blockchain Wallet',
            'description' => 'Secure multi-chain cryptocurrency wallet with NFT support and staking features.',
            'posted_by' => 'Gunawan Setiawan',
            'posted_at' => now()->subMinutes(10)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=40',
            'tags' => ['Blockchain', 'Ethereum', 'Web3'],
            'price' => 4500000
        ],
        [
            'title' => 'Video Streaming Service',
            'description' => 'Netflix-like platform with content management and subscription billing.',
            'posted_by' => 'Hana Lestari',
            'posted_at' => now()->subMinutes(5)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=45',
            'tags' => ['Video', 'AWS', 'Subscription'],
            'price' => 6700000
        ],
        [
            'title' => 'Smart Parking System',
            'description' => 'IoT enabled parking lot management with license plate recognition and mobile payments.',
            'posted_by' => 'Irfan Maulana',
            'posted_at' => now()->subMinutes(2)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=50',
            'tags' => ['Computer Vision', 'Python', 'IoT'],
            'price' => 3800000
        ],
        [
            'title' => 'E-commerce Mobile App',
            'description' => 'Complete shopping app with product catalog, cart, and payment processing.',
            'posted_by' => 'Jihan Aulia',
            'posted_at' => now()->subMinutes(1)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=55',
            'tags' => ['React Native', 'E-commerce', 'Firebase'],
            'price' => 3200000
        ],
        [
            'title' => 'Telemedicine Platform',
            'description' => 'Video consultation platform connecting doctors with patients remotely.',
            'posted_by' => 'Kevin Pratama',
            'posted_at' => now()->subMinutes(1)->format('Y-m-d H:i'),
            'avatar' => 'https://i.pravatar.cc/100?img=60',
            'tags' => ['WebRTC', 'Healthcare', 'Video'],
            'price' => 5400000
        ]
    ];
@endphp

    <!-- Mobile-first grid layout -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
        @foreach ($projects as $project)
        <div class="bg-gray-800 rounded-2xl shadow hover:shadow-xl transition duration-300 flex flex-col">
            <!-- Project Image -->
            <div class="relative pb-[50%] sm:pb-[75%]">
                <img src="https://via.placeholder.com/400x200?text=Project+Image"
                     alt="Project Image"
                     class="absolute inset-0 w-full h-full object-cover rounded-t-2xl">
            </div>

            <div class="p-4 flex flex-col flex-1">
                <!-- Mobile: Stacked layout, Desktop: Side-by-side -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-3">
                    <img src="{{ $project['avatar'] }}" alt="Avatar"
                         class="w-9 h-9 rounded-full border-2 border-blue-500">
                    <div class="sm:flex-1">
                        <p class="text-sm text-white font-semibold">{{ $project['posted_by'] }}</p>
                        <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($project['posted_at'])->diffForHumans() }}</p>
                    </div>
                    <!-- Price on mobile moves below title -->
                    <span class="sm:hidden text-sm text-green-400 font-semibold bg-green-900 px-2 py-1 rounded-xl self-start">
                        Rp {{ number_format($project['price'], 0, ',', '.') }}
                    </span>
                </div>

                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-md font-bold text-white truncate flex-1">{{ $project['title'] }}</h2>
                    <!-- Price hidden on mobile (shown above) -->
                    <span class="hidden sm:block text-sm text-green-400 font-semibold bg-green-900 px-2 py-1 rounded-xl">
                        Rp {{ number_format($project['price'], 0, ',', '.') }}
                    </span>
                </div>

                <!-- Description with line clamp -->
                <p class="text-sm text-gray-400 mb-2 line-clamp-2 sm:line-clamp-3">{{ $project['description'] }}</p>

                <!-- Tags with wrapping -->
                <div class="flex flex-wrap gap-1 sm:gap-2 mt-auto">
                    @foreach ($project['tags'] as $tag)
                    <span class="text-xs bg-blue-900 text-blue-300 px-2 py-1 rounded-full font-medium">{{ $tag }}</span>
                    @endforeach
                </div>

                <!-- Propose Button -->
                <div class="mt-4">
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 flex items-center justify-center">
                        <span class="mr-2">📬</span>
                        <span>Propose</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection