@extends('layouts.app')

@section('content')


<div class="max-w-7xl mx-auto px-4 py-10">
    <div class="mb-10">
        <h1 class="text-3xl font-bold text-white">🧩 Explore Posted Projects</h1>
        <p class="text-gray-400 text-sm mt-2">Discover amazing ideas shared by others in the community.</p>
    </div>

    <div class="mb-10">
        <div class="bg-gray-900 rounded-xl p-6 shadow-lg">
            <h2 class="text-2xl font-semibold text-blue-400">Welcome to Kobar</h2>
            <p class="text-gray-300 mt-2">Here you can post your project, explore others, and propose to collaborate. Your journey starts now, {{ Auth::user()->name }}!</p>
        </div>
    </div>

    @php
        $projects = [
            [
                'title' => 'Smart Hopo Dashboard',
                'description' => 'Control panel UI for managing smart devices.',
                'posted_by' => 'Daffa Aliefiandy',
                'posted_at' => '2025-04-01 14:32',
                'avatar' => 'https://i.pravatar.cc/100?img=3',
                'tags' => ['IoT', 'Dashboard', 'Tailwind'],
                'price' => 1500000
            ],
            [
                'title' => 'Inventory Management',
                'description' => 'Track and audit warehouse inventory.',
                'posted_by' => 'Putri Ayu',
                'posted_at' => '2025-04-02 09:12',
                'avatar' => 'https://i.pravatar.cc/100?img=5',
                'tags' => ['Warehouse', 'PHP', 'MySQL'],
                'price' => 2500000
            ],
            [
                'title' => 'E-learning Platform',
                'description' => 'Online learning system with quizzes.',
                'posted_by' => 'Rizky Saputra',
                'posted_at' => '2025-04-03 18:05',
                'avatar' => 'https://i.pravatar.cc/100?img=7',
                'tags' => ['Education', 'Laravel', 'Livewire'],
                'price' => 1800000
            ],
            [
                'title' => 'Crypto Tracker',
                'description' => 'Track crypto investments live.',
                'posted_by' => 'Lina Mardiana',
                'posted_at' => '2025-04-04 10:22',
                'avatar' => 'https://i.pravatar.cc/100?img=12',
                'tags' => ['Crypto', 'API', 'React'],
                'price' => 3200000
            ],
        ];
    @endphp

    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($projects as $project)
            <div class="bg-gray-800 rounded-2xl shadow hover:shadow-xl transition duration-300 flex flex-col">
                <img src="https://via.placeholder.com/400x200?text=Project+Image"
                     alt="Project Image"
                     class="rounded-t-2xl w-full h-40 object-cover">

                <div class="p-4 flex flex-col flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ $project['avatar'] }}" alt="Avatar"
                             class="w-9 h-9 rounded-full border-2 border-blue-500">
                        <div>
                            <p class="text-sm text-white font-semibold">{{ $project['posted_by'] }}</p>
                            <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($project['posted_at'])->diffForHumans() }}</p>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-md font-bold text-white truncate">{{ $project['title'] }}</h2>
                        <span class="text-sm text-green-400 font-semibold bg-green-900 px-2 py-1 rounded-xl">
                            Rp {{ number_format($project['price'], 0, ',', '.') }}
                        </span>
                    </div>

                    <p class="text-sm text-gray-400 mb-2 line-clamp-2">{{ $project['description'] }}</p>

                    <div class="flex flex-wrap gap-2 mt-auto">
                        @foreach ($project['tags'] as $tag)
                            <span class="text-xs bg-blue-900 text-blue-300 px-2 py-1 rounded-full font-medium">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                            📬 Propose
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Smooth fade-in & auto-hide intro -->
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const intro = document.getElementById('intro-welcome');
        setTimeout(() => {
            intro.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => intro.remove(), 1000); // Remove from DOM after fade
        }, 6000);
    });
</script>

<!-- Add fade-in animation (custom) -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.98); }
        to { opacity: 1; transform: scale(1); }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }
</style>
@endsection
