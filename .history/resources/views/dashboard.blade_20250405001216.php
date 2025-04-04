@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Projects Posted</h1>

    @php
        $projects = [
            [
                'title' => 'Smart Home Dashboard',
                'description' => 'A control panel for managing smart devices in a house.',
                'posted_by' => 'Daffa Aliefiandy',
                'posted_at' => '2025-04-01 14:32'
            ],
            [
                'title' => 'Inventory Management System',
                'description' => 'Web-based system to manage warehouse inventories efficiently.',
                'posted_by' => 'Putri Ayu',
                'posted_at' => '2025-04-02 09:12'
            ],
            [
                'title' => 'E-learning Platform',
                'description' => 'An online learning platform with quizzes, videos, and live sessions.',
                'posted_by' => 'Rizky Saputra',
                'posted_at' => '2025-04-03 18:05'
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($projects as $project)
            <div class="bg-white shadow-lg rounded-2xl p-4 flex flex-col">
                <img src="https://via.placeholder.com/400x200?text=Project+Image" alt="Project Image"
                     class="rounded-xl mb-4 w-full h-48 object-cover">

                <div class="flex-1">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $project['title'] }}</h2>
                    <p class="text-gray-600 mt-2">{{ $project['description'] }}</p>
                </div>

                <div class="mt-4 text-sm text-gray-500">
                    <span>Posted by <strong>{{ $project['posted_by'] }}</strong></span><br>
                    <span>on {{ \Carbon\Carbon::parse($project['posted_at'])->format('F j, Y \a\t H:i') }}</span>
                </div>

                <div class="mt-6">
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300">
                        Propose
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
