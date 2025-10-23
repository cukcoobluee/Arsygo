@extends('admin.layout.layout')
@section('content')

<div class="container mx-auto px-6 py-8">
  <h1 class="text-2xl font-bold mb-6">Tambah Kendaraan</h1>

  <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-full max-w-lg">
    @csrf

    <div class="mb-4">
      <label class="block mb-1">Nama Kendaraan</label>
      <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Transmisi</label>
      <select name="transmission" class="w-full border px-3 py-2 rounded" required>
        <option value="matic">Matic</option>
        <option value="manual">Manual</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Kapasitas</label>
      <input type="text" name="capacity" placeholder="misal: 4-7" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Harga (Rp)</label>
      <input type="number" name="price" class="w-full border px-3 py-2 rounded" required>
    </div>

    <div>
    <label class="inline-flex items-center">
        <input type="checkbox" name="has_driver" value="1" class="form-checkbox">
        <span class="ml-2">Dengan Sopir</span>
    </label>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Gambar</label>
      <input type="file" name="image" accept="image/*" class="w-full">
    </div>

    <div class="flex gap-3">
      <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Simpan</button>
      <a href="{{ route('admin.vehicles.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</a>
    </div>
  </form>
</div>
@endsection
