@extends('admin.layout.layout')
@section('content')

<div class="container mx-auto px-6 py-8">
  <h1 class="text-2xl font-bold mb-6">Edit Kendaraan</h1>

  <form action="{{ route('admin.vehicles.update',$vehicle->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-full max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="block mb-1">Nama Kendaraan</label>
      <input type="text" name="name" value="{{ old('name',$vehicle->name) }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Transmisi</label>
      <select name="transmission" class="w-full border px-3 py-2 rounded" required>
        <option value="matic" {{ $vehicle->transmission=='matic'?'selected':'' }}>Matic</option>
        <option value="manual" {{ $vehicle->transmission=='manual'?'selected':'' }}>Manual</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Kapasitas</label>
      <input type="text" name="capacity" value="{{ old('capacity',$vehicle->capacity) }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Harga (Rp)</label>
      <input type="number" name="price" value="{{ old('price',$vehicle->price) }}" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4 flex items-center">
      <input type="checkbox" name="has_driver" id="has_driver" class="mr-2"
             {{ $vehicle->has_driver ? 'checked' : '' }}>
      <label for="has_driver">Termasuk Sopir?</label>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Gambar</label>
      @if($vehicle->image)
        <img src="{{ asset('storage/'.$vehicle->image) }}" class="w-32 h-20 object-cover mb-2 rounded">
      @endif
      <input type="file" name="image" accept="image/*" class="w-full">
    </div>

    <div class="flex gap-3">
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
      <a href="{{ route('admin.vehicles.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</a>
    </div>
  </form>
</div>
@endsection
