@extends('admin.layout.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-extrabold mb-8 text-gray-800">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card Testimonial -->
        <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-700">Jumlah Testimonial</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-6 0v2h6v-2m0 0V9h-6v6" />
                </svg>
            </div>
            <p class="text-4xl font-extrabold mt-4 text-gray-900">{{ $testimonialCount ?? 0 }}</p>
        </div>

        <!-- Card Pending -->
        <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-700">Status Pending</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                </svg>
            </div>
            <p class="text-4xl font-extrabold mt-4 text-yellow-600">{{ $pendingCount ?? 0 }}</p>
        </div>

        <!-- Card Approved -->
        <div class="bg-white rounded-3xl shadow-lg p-6 hover:shadow-2xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-700">Status Approved</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <p class="text-4xl font-extrabold mt-4 text-green-600">{{ $approvedCount ?? 0 }}</p>
        </div>
    </div>

    <div class="mt-10">
        <a href="{{ url('/admin/testimonials') }}" 
           class="inline-block bg-gradient-to-r from-yellow-600 to-amber-500 text-white px-6 py-3 rounded-2xl shadow-lg hover:from-yellow-700 hover:to-amber-600 transition-colors duration-300 font-semibold">
           Kelola Testimonials
        </a>
    </div>
</div>
@endsection
