{{-- resources/views/admin/hotels/create.blade.php --}}
@extends('admin.layout.layout')

@section('title', 'Tambah Hotel')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Tambah Hotel Baru</h1>
        <a href="{{ route('admin.hotels.index') }}" 
           class="px-4 py-2 text-amber-800 font-bold inline-flex items-center hover:text-amber-600 transition">
            <!-- Icon Back -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-5 w-5 mr-2" 
                 fill="none" 
                 viewBox="0 0 24 24" 
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    
    
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded p-6 shadow-md">
        @csrf
        
        <!-- Nama Hotel -->
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Hotel</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        
        <!-- Lokasi -->
        <div class="mb-4">
            <label for="lokasi" class="block text-gray-700 font-medium mb-2">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" class="w-full border rounded px-3 py-2">
        </div>
        
        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="block text-gray-700 font-medium mb-2">Harga / Room</label>
            <input type="number" name="harga" id="harga" value="{{ old('harga') }}" class="w-full border rounded px-3 py-2 no-spinner" required>
        </div>
        
        <!-- Gambar Hotel -->
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-medium mb-2">Gambar Hotel</label>
            <input type="file" name="gambar" id="gambar" class="w-full border rounded px-3 py-2">
        </div>
        
        <button type="submit" class="px-6 py-2 bg-amber-900 text-white rounded hover:bg-amber-800 transition">Simpan Hotel</button>
    </form>
</div>
@endsection
