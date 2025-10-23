@extends('admin.layout.layout')
@section('title', 'Edit Hotel')
@section('content')
<div class="container mx-auto p-6">
    <!-- Header dengan judul + tombol kembali sejajar -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Edit Hotel</h1>
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

    <form action="{{ route('admin.hotels.update', $hotel->id) }}" 
        method="POST" 
        enctype="multipart/form-data" 
        class="bg-white rounded p-6 shadow-md">
      @csrf
      @method('PUT')
  
      <div class="grid grid-cols-3 gap-4 mb-4 items-center">
          <label for="nama" class="text-gray-700 font-medium">Nama Hotel</label>
          <input type="text" name="nama" id="nama" 
                 value="{{ old('nama', $hotel->nama) }}" 
                 class="col-span-2 border rounded px-3 py-2 w-full" required>
      </div>
  
      <div class="grid grid-cols-3 gap-6 mb-4 items-center">
          <label for="lokasi" class="text-gray-700 font-medium">Lokasi</label>
          <input type="text" name="lokasi" id="lokasi" 
                 value="{{ old('lokasi', $hotel->lokasi) }}" 
                 class="col-span-2 border rounded px-3 py-2 w-full">
      </div>
  
      <div class="grid grid-cols-3 gap-6 mb-4 items-center">
          <label for="harga" class="text-gray-700 font-medium">Harga / Room</label>
          <input type="number" name="harga" id="harga" 
                 value="{{ old('harga', $hotel->harga) }}" 
                 class="col-span-2 border rounded px-3 py-2 w-full no-spinner" required>
      </div>
  
      <div class="grid grid-cols-3 gap-6 mb-4 items-start">
          <label for="gambar" class="text-gray-700 font-medium">Gambar Hotel</label>
          <div class="col-span-2">
              @if($hotel->gambar)
                  <img src="{{ asset('storage/'.$hotel->gambar) }}" 
                       alt="{{ $hotel->nama }}" 
                       class="w-32 mb-2 rounded">
              @endif
              <input type="file" name="gambar" id="gambar" 
                     class="w-full border rounded px-3 py-2">
              <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
          </div>
      </div>
  
      <!-- Tombol simpan sejajar -->
      <div class="grid grid-cols-3 gap-6 items-center">
          <div></div> <!-- kosong untuk sejajarkan -->
          <div class="col-span-2">
              <button type="submit" 
                      class="px-6 py-2 bg-amber-900 text-white rounded hover:bg-amber-800 transition">
                  Simpan Perubahan
              </button>
          </div>
      </div>
  </form>
  
</div>
@endsection
