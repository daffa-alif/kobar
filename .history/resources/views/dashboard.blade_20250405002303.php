@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">🧩 Explore Posted Projects</h1>

    @php
        $projects = [
            [
                'title' => 'Smart Home Dashboard',
                'description' => 'A control panel UI for managing IoT smart home devices with real-time status.',
                'posted_by' => 'Daffa Aliefiandy',
                'posted_at' => '2025-04-01 14:32',
                'avatar' => 'https://i.pravatar.cc/100?img=3',
                'tags' => ['IoT', 'Dashboard', 'Tailwind'],
                'price' => 1500000
            ],
            [
                'title' => 'Inventory Management System',
                'description' => 'Web-based solution for tracking and auditing warehouse inventory efficiently.',
                'posted_by' => 'Putri Ayu',
                'posted_at' => '2025-04-02 09:12',
                'avatar' => 'https://i.pravatar.cc/100?img=5',
                'tags' => ['Warehouse', 'PHP', 'MySQL'],
                'price' => 2500000
            ],
            [
                'title' => 'E-learning Platform',
                'description' => 'Online learning system with video tutorials, quizzes, and live instructor sessions.',
                'posted_by' => 'Rizky Saputra',
                'posted_at' => '2025-04-03 18:05',
                'avatar' => 'https://i.pravatar.cc/100?img=7',
                'tags' => ['Education', 'Laravel', 'Livewire'],
                'price' => 1800000
            ],
            [
                'title' => 'Crypto Portfolio Tracker',
                'description' => 'Track your cryptocurrency investments and get real-time market data.',
                'posted_by' => 'Lina Mardiana',
                'posted_at' => '2025-04-04 10:22',
                'avatar' => 'https://i.pravatar.cc/100?img=12',
                'tags' => ['Crypto', 'API', 'React'],
                'price' => 3200000
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($projects as $project)
            <div class="bg-white rounded-2xl shadow hover:shadow-xl transition duration-300 flex flex-col">
                <img src="https://via.placeholder.com/400x200?text=Project+Image"
                     alt="Project Image"
                     class="rounded-t-2xl w-full h-44 object-cover">

                <div class="p-5 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ $project['avatar'] }}" alt="Avatar"
                             class="w-10 h-10 rounded-full border-2 border-blue-500">
                        <div>
                            <p class="text-sm text-gray-700 font-semibold">{{ $project['posted_by'] }}</p>
                            <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($project['posted_at'])->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-bold text-gray-900">{{ $project['title'] }}</h2>
                        <span class="text-sm text-green-600 font-semibold bg-green-100 px-2 py-1 rounded-xl">
                            Rp {{ number_format($project['price'], 0, ',', '.') }}
                        </span>
                    </div>

                    <p class="text-sm text-gray-600 flex-1">{{ $project['description'] }}</p>

                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($project['tags'] as $tag)
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full font-medium">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                            📬 Propose
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
