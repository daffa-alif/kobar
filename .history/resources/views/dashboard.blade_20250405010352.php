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
                'title' => 'Smart Hopo Dashboard',
                'description' => 'Control panel UI for managing smart devices.',
                'posted_by' => 'Daffa Aliefiandy',
                'posted_at' => '2025-04-01 14:32',
                'avatar' => 'https://i.pravatar.cc/100?img=3',
                'tags' => ['IoT', 'Dashboard', 'Tailwind'],
                'price' => 1500000
            ],
            // ... other projects
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