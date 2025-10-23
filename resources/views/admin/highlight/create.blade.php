@extends('admin.layout.layout')
@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">
    <h2 class="text-3xl font-bold mb-6 text-amber-900 text-center">Tambah Highlight Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.highlight.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" placeholder="Judul Highlight" 
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-300" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea name="description" placeholder="Deskripsi Highlight" rows="4" 
                      class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-300"></textarea>
        </div>

        <!-- Image -->
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded-lg">
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" 
                    class="px-6 py-3 bg-amber-900 text-white font-semibold rounded-xl shadow-md hover:bg-amber-800 transition">
                Simpan Highlight
            </button>
        </div>
    </form>
</div>

@endsection
