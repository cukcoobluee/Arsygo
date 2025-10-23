@extends('admin.layout.layout')

@section('content')
<div class="container mx-auto p-6">
  <div class="container mx-auto max-w-6xl py-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Hotels</h2>

    <!-- Notifikasi sukses -->
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    <!-- Tombol Tambah Hotel -->
    <div class="mb-4">
      <a href="{{ route('admin.hotels.create') }}" 
         class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition">
         + Tambah Hotel
      </a>
    </div>

    <!-- Table Hotel -->
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="table-auto w-full border-collapse min-w-max">
        <thead class="bg-amber-900 text-white">
          <tr>
            <th class="p-3 text-left w-10">No</th>
            <th class="p-3 text-left">Nama</th>
            <th class="p-3 text-left">Lokasi</th>
            <th class="p-3 text-center">Harga</th>
            <th class="p-3 text-center w-[120px]">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($hotels as $h)
            <tr class="border-t text-gray-700 hover:bg-gray-50 transition">
              <td class="p-3 text-center">{{ $loop->iteration }}</td>
              <td class="p-3 break-words">{{ $h->nama }}</td>
              <td class="p-3 break-words">{{ $h->lokasi }}</td>
              <td class="p-3 text-center whitespace-nowrap">
                Rp {{ number_format($h->harga,0,',','.') }}
              </td>
              <td class="p-3">
                <div class="flex justify-center gap-2 flex-wrap">
                  <!-- Tombol Edit -->
                  <a href="{{ route('admin.hotels.edit', $h->id) }}" 
                     class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition"
                     title="Edit">
                     <svg xmlns="http://www.w3.org/2000/svg" 
                          class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                               d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l.586.586a1 1 0 010 1.414L11 15H9v-2z" />
                     </svg>
                  </a>

                  <!-- Tombol Hapus -->
                  <form action="{{ route('admin.hotels.destroy', $h->id) }}" method="POST" 
                        onsubmit="return confirm('Hapus hotel?')">
                    @csrf 
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition"
                            title="Hapus">
                      <svg xmlns="http://www.w3.org/2000/svg" 
                          class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                      </svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="p-4 flex justify-center border-t">
        {{ $hotels->links() }}
      </div>
    </div>
  </div>
</div>    
@endsection
