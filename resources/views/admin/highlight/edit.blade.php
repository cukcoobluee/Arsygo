@extends('admin.layout.layout')
@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-3xl font-bold mb-6 text-amber-900 text-center">Edit Highlight</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.highlight.update', $highlight->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="{{ $highlight->title }}" 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-300" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="4" 
                      class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-300">{{ $highlight->description }}</textarea>
        </div>

        <!-- Image -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-lg">
            @if($highlight->image)
                <img src="{{ asset('storage/'.$highlight->image) }}" 
                     class="w-40 h-40 object-cover mt-4 rounded-lg shadow-md" 
                     alt="{{ $highlight->title }}">
            @endif
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" 
                    class="px-6 py-3 bg-amber-900 text-white font-semibold rounded-xl shadow-md hover:bg-amber-800 transition">
                Update Highlight
            </button>
        </div>
    </form>
</div>

@endsection
