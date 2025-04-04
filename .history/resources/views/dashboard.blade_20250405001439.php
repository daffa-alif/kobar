@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Recent Projects</h1>
    
    <?php
    // Dummy data array
    $projects = [
        [
            'title' => 'E-commerce Platform Development',
            'description' => 'Building a full-featured e-commerce platform with payment integration, inventory management, and customer analytics.',
            'posted_by' => 'Alex Johnson',
            'posted_at' => '2023-05-15',
            'skills' => ['PHP', 'Laravel', 'Vue.js', 'MySQL'],
            'budget' => '$5,000 - $10,000'
        ],
        [
            'title' => 'Mobile App for Fitness Tracking',
            'description' => 'Develop a cross-platform mobile application that tracks fitness activities, nutrition, and provides personalized workout plans.',
            'posted_by' => 'Sarah Miller',
            'posted_at' => '2023-05-18',
            'skills' => ['React Native', 'Firebase', 'Node.js'],
            'budget' => '$8,000 - $12,000'
        ],
        [
            'title' => 'AI-Powered Chatbot Implementation',
            'description' => 'Implement an AI chatbot for customer support that can handle FAQs, process orders, and provide product recommendations.',
            'posted_by' => 'David Chen',
            'posted_at' => '2023-05-20',
            'skills' => ['Python', 'TensorFlow', 'NLP', 'Django'],
            'budget' => '$6,500 - $9,500'
        ],
        [
            'title' => 'Website Redesign for Marketing Agency',
            'description' => 'Complete redesign of existing website with modern UI/UX, improved navigation, and CMS integration.',
            'posted_by' => 'Emily Wilson',
            'posted_at' => '2023-05-22',
            'skills' => ['WordPress', 'JavaScript', 'CSS3', 'HTML5'],
            'budget' => '$3,000 - $5,000'
        ],
        [
            'title' => 'Blockchain Wallet Application',
            'description' => 'Development of a secure cryptocurrency wallet with multi-chain support and transaction history.',
            'posted_by' => 'Michael Rodriguez',
            'posted_at' => '2023-05-25',
            'skills' => ['Solidity', 'Web3.js', 'React', 'Ethereum'],
            'budget' => '$15,000 - $20,000'
        ]
    ];
    ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($projects as $project)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
            <!-- Project Image Placeholder -->
            <img src="https://via.placeholder.com/600x400?text=Project+Image" alt="Project Image" class="w-full h-48 object-cover">
            
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $project['title'] }}</h2>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $project['budget'] }}</span>
                </div>
                
                <p class="text-gray-600 mb-4">{{ $project['description'] }}</p>
                
                <!-- Skills Tags -->
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($project['skills'] as $skill)
                    <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-full">{{ $skill }}</span>
                    @endforeach
                </div>
                
                <!-- Posted Info -->
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span>Posted by: <span class="font-medium text-gray-700">{{ $project['posted_by'] }}</span></span>
                    <span>{{ date('M d, Y', strtotime($project['posted_at'])) }}</span>
                </div>
                
                <!-- Action Button -->
                <button class="w-full bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-300">
                    Propose Project
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection