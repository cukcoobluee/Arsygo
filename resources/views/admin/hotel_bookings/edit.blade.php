@extends('admin.layout.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
  <h2 class="text-3xl font-bold mb-6 text-gray-800">Edit Booking</h2>

  <div class="bg-white p-8 rounded-xl shadow-md">
    <form action="{{ route('admin.hotel-bookings.update', $booking->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Nama -->
      <div class="flex items-center">
        <label class="w-40 text-sm font-semibold text-gray-700">Nama</label>
        <input type="text" name="nama" value="{{ $booking->nama }}"
          class="flex-1 bg-gray-200 border border-gray-300 focus:border-amber-400 focus:ring-2 focus:ring-amber-200 rounded-lg p-3 shadow-sm text-sm placeholder-gray-500">
      </div>

      <!-- Email -->
      <div class="flex items-center">
        <label class="w-40 text-sm font-semibold text-gray-700">Email</label>
        <input type="email" name="email" value="{{ $booking->email }}"
          class="flex-1 bg-gray-200 border border-gray-300 focus:border-amber-400 focus:ring-2 focus:ring-amber-200 rounded-lg p-3 shadow-sm text-sm placeholder-gray-500">
      </div>

      <!-- Telepon -->
      <div class="flex items-center">
        <label class="w-40 text-sm font-semibold text-gray-700">Telepon</label>
        <input type="text" name="telepon" value="{{ $booking->telepon }}"
          class="flex-1 bg-gray-200 border border-gray-300 focus:border-amber-400 focus:ring-2 focus:ring-amber-200 rounded-lg p-3 shadow-sm text-sm placeholder-gray-500">
      </div>

      <!-- Status -->
      <div class="flex items-center">
        <label class="w-40 text-sm font-semibold text-gray-700">Status</label>
        <div class="relative">
          <select name="status" id="statusSelect"
            class="w-44 appearance-none rounded-lg p-2.5 pr-8 text-sm font-semibold shadow-sm transition duration-200 ease-in-out focus:outline-none border-transparent">
              <option value="pending" class="bg-yellow-100 text-yellow-700 font-medium px-2 py-1 focus:outline-none"
                {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" class="bg-green-100 text-green-700 font-medium px-2 py-1 focus:outline-none"
                {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
              <option value="cancelled" class="bg-red-100 text-red-700 font-medium px-2 py-1 focus:outline-none"
                {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
          </select>
          
          <!-- Custom Arrow -->
          <div class="absolute inset-y-0 right-2 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" 
                 viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
          </div>
        </div>
      </div>
      
      <!-- Tombol -->
      <div class="flex items-center">
        <label class="w-40"></label>
        <div class="flex gap-3">
          <button type="submit"
            class="bg-green-500 hover:bg-green-600 transition px-5 py-2.5 rounded-lg text-white font-medium shadow">
            Simpan
          </button>
        </div>
      </div>
    </form>

    <!-- Tombol Kembali -->
    <a href="{{ route('admin.hotel_bookings.index') }}"
      class="transition my-4 rounded-lg text-amber-500 hover:text-amber-600 font-medium flex items-center w-max object-bottom-right">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      Kembali
    </a>
  </div>

  <script>
    const select = document.getElementById('statusSelect');

    function updateStatusColor() {
      select.classList.remove(
        'bg-yellow-100','text-yellow-700',
        'bg-green-100','text-green-700',
        'bg-red-100','text-red-700'
      );

      if (select.value === 'pending') {
        select.classList.add('bg-yellow-100','text-yellow-700');
      } else if (select.value === 'approved') {
        select.classList.add('bg-green-100','text-green-700');
      } else if (select.value === 'cancelled') {
        select.classList.add('bg-red-100','text-red-700');
      }
    }

    updateStatusColor();
    select.addEventListener('change', updateStatusColor);
  </script>
</div>
@endsection
