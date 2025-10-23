@extends('admin.layout.layout')
@section('content')

<div class="container mx-auto px-6 py-8">
  <h1 class="text-2xl font-bold mb-6">Daftar Reservasi Kendaraan</h1>

  @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
      {{ session('success') }}
    </div>
  @endif

  <table class="w-full border border-gray-200 rounded shadow text-sm">
    <thead class="bg-gray-100">
      <tr>
        <th class="p-3 text-left">#</th>
        <th class="p-3 text-left">Nama</th>
        <th class="p-3 text-left">Kendaraan</th>
        <th class="p-3 text-left">Tanggal</th>
        <th class="p-3 text-left">Durasi</th>
        <th class="p-3 text-left">Telepon</th>
        <th class="p-3 text-left">Email</th>
        <th class="p-3 text-left">Catatan</th>
        <th class="p-3 text-left">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($reservations as $r)
      <tr class="border-t">
        <td class="p-3">{{ $loop->iteration }}</td>
        <td class="p-3">{{ $r->full_name }}</td>
        <td class="p-3">{{ $r->vehicle->name ?? '-' }}</td>
        <td class="p-3">{{ $r->rental_date }}</td>
        <td class="p-3">{{ $r->duration_days }} hari</td>
        <td class="p-3">{{ $r->phone }}</td>
        <td class="p-3">{{ $r->email }}</td>
        <td class="p-3">{{ $r->notes ?? '-' }}</td>
        <td class="p-3">
          <form action="{{ route('admin.transport-reservations.destroy',$r->id) }}" method="POST" onsubmit="return confirm('Hapus reservasi ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition" title="Hapus">
              <svg xmlns="http://www.w3.org/2000/svg" 
                   class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
              </svg>
            </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="9" class="p-3 text-center text-gray-500">Belum ada reservasi.</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-4">
    {{ $reservations->links() }}
  </div>
</div>
@endsection
