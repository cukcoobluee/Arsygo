@extends('admin.layout.layout')
@section('content')

<div class="container mx-auto px-6 py-8">
    <div class="bg-white shadow-lg rounded-2xl p-8 max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-gray-800 text-center">Edit Event</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.kalender.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Month</label>
                <input type="text" name="month" value="{{ $event->month }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Title</label>
                <input type="text" name="title" value="{{ $event->title }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Date</label>
                <input type="date" name="date" value="{{ $event->date }}" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Price</label>
                <input type="text" name="price" value="{{ $event->price }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Time</label>
                <input type="text" name="time" value="{{ $event->time }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Location</label>
                <input type="text" name="location" value="{{ $event->location }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Slots</label>
                <input type="number" name="slots" value="{{ $event->slots }}"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Image</label>
                <input type="file" name="image"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
                @if($event->image)
                    <img src="{{ asset('storage/'.$event->image) }}" class="w-40 h-40 object-cover rounded mt-2 border">
                @endif
            </div>

            <button type="submit"
                class="w-full bg-amber-900 text-white font-semibold px-6 py-3 rounded-lg hover:bg-amber-800 transition-colors duration-300">
                Update Event
            </button>
        </form>
    </div>
</div>

@endsection
