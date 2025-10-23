@extends('admin.layout.layout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Highlight</h2>
    <a href="{{ route('admin.highlight.create') }}" 
       class="bg-amber-900 text-white px-4 py-2 rounded hover:bg-amber-800">
        Tambah Highlight
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($highlights as $highlight)
    <div class="bg-white rounded-2xl shadow p-4 relative">
        @if($highlight->image)
            <img src="{{ asset('storage/'.$highlight->image) }}" 
                 class="w-full h-48 object-cover rounded-2xl mb-4" 
                 alt="{{ $highlight->title }}">
        @else
            <div class="w-full h-48 flex items-center justify-center bg-gray-200 text-gray-500 rounded-2xl mb-4">
                No Image
            </div>
        @endif

        <h3 class="text-lg font-bold mb-2">{{ $highlight->title }}</h3>
        <p class="text-gray-600 text-sm mb-4">{{ $highlight->description }}</p>

        <div class="flex justify-end space-x-2">
            <!-- Tombol Edit -->
            <a href="{{ route('admin.highlight.edit', $highlight->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg transition"
               title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15.232 5.232l3.536 3.536M9 13l6.293-6.293a1 1 0 011.414 0l.586.586a1 1 0 010 1.414L11 15H9v-2z" />
                </svg>
            </a>

            <!-- Tombol Delete -->
            <form action="{{ route('admin.highlight.destroy', $highlight->id) }}" 
                  method="POST" 
                  onsubmit="return confirm('Yakin ingin menghapus highlight ini?');"
                  class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition"
                        title="Hapus">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
