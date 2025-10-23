@extends('admin.layout.layout')
@section('content')

<div class="container mx-auto px-6 py-8">
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Tambah Event Baru</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.kalender.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Month</label>
                <input type="text" name="month" placeholder="Month" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Title</label>
                <input type="text" name="title" placeholder="Title" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Date</label>
                <input type="date" name="date" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Price</label>
                <input type="text" name="price" placeholder="Price"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Time</label>
                <input type="text" name="time" placeholder="Time"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Location</label>
                <input type="text" name="location" placeholder="Location"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Slots</label>
                <input type="number" name="slots" placeholder="Slots"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Image</label>
                <input type="file" name="image"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <button type="submit"
                class="w-full bg-amber-900 text-white font-semibold px-6 py-3 rounded-lg hover:bg-amber-800 transition-colors duration-300">
                Simpan Event
            </button>
        </form>
    </div>
</div>

@endsection
