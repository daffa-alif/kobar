@extends('layouts.app')

@section('content')
<div class="bg-gray-100 p-8 rounded-lg">
    <h1 class="text-3xl font-bold mb-4">Welcome to Our Website</h1>
    <p class="mb-6">This page demonstrates a complex navbar with sticky functionality and smooth mobile dropdown menu.</p>
    <p class="mb-6">Scroll down to see the sticky navbar in action.</p>
    
    <!-- Content to create scrolling -->
    <div class="space-y-6">
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Our Services</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius risus nec odio tincidunt, nec egestas nulla ultrices.</p>
      </div>
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius risus nec odio tincidunt, nec egestas nulla ultrices.</p>
      </div>
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Our Projects</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius risus nec odio tincidunt, nec egestas nulla ultrices.</p>
      </div>
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Contact Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius risus nec odio tincidunt, nec egestas nulla ultrices.</p>
      </div>
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Our Team</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius risus nec odio tincidunt, nec egestas nulla ultrices.</p>
      </div>
      <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Testimonials</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius risus nec odio tincidunt, nec egestas nulla ultrices.</p>
      </div>
      <!-- Add more content blocks as needed -->
    </div>
  </div>
@endsection