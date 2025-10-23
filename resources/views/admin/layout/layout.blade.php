<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="icon" href="{{ asset('img/arsygo-logo.png') }}" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-64 bg-amber-900 text-white h-screen shadow-lg overflow-y-auto">
        <div class="p-6 text-2xl font-bold border-b border-amber-700 flex items-center justify-center space-x-2">
            <img src="{{ asset('img/arsygo-logo.png') }}" alt="Logo Arsygo" class="h-10 w-10 object-contain">
            <span class="py-2 ">Admin Panel</span>
        </div>
        <nav class="mt-6">

            <!-- Dashboard -->
            <a href="{{ url('/admin') }}"
               class="flex items-center px-6 py-3 mb-2 rounded-lg hover:bg-amber-700 transition-colors {{ request()->is('admin') ? 'bg-amber-700' : '' }}">
               <span class="ml-2 font-medium">Dashboard</span>
            </a>

            <!-- Testimonials -->
            <a href="{{ url('/admin/testimonials') }}"
               class="flex items-center px-6 py-3 mb-2 rounded-lg hover:bg-amber-700 transition-colors {{ request()->is('admin/testimonials*') ? 'bg-amber-700' : '' }}">
               <span class="ml-2 font-medium">Testimonials</span>
            </a>

            <!-- Booking umum -->
            <a href="{{ route('admin.bookings.index') }}"
               class="flex items-center px-6 py-3 mb-2 rounded-lg hover:bg-amber-700 transition-colors {{ request()->is('admin/bookings*') ? 'bg-amber-700' : '' }}">
               <span class="ml-2 font-medium">Open Trip</span>
            </a>

            <!-- Hotels dengan Submenu -->
            <div x-data="{ open: {{ request()->is('admin/hotels*') ? 'true' : 'false' }} }" class="mb-2">
                <button @click="open = !open"
                        class="flex items-center w-full px-6 py-3 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/hotels*') ? 'bg-amber-700' : '' }}">
                    <span class="ml-2 font-medium">Hotels</span>
                    <svg :class="{'rotate-90': open}" class="ml-auto h-4 w-4 transform transition-transform" 
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <div x-show="open" class="ml-4 mt-1 flex flex-col space-y-1">
                    <a href="{{ route('admin.hotels.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/hotels') ? 'bg-amber-700' : '' }}">
                        Hotels
                    </a>
                    <a href="{{ route('admin.hotel_bookings.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/hotel_bookings*') ? 'bg-amber-700' : '' }}">
                        Hotel Bookings
                    </a>
                </div>
            </div>

            <!-- Transportasi dengan Submenu -->
            <div x-data="{ open: {{ request()->is('admin/vehicles*') || request()->is('admin/transport_reservations*') ? 'true' : 'false' }} }" class="mb-2">
                <button @click="open = !open"
                        class="flex items-center w-full px-6 py-3 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/vehicles*') || request()->is('admin/transport_reservations*') ? 'bg-amber-700' : '' }}">
                    <span class="ml-2 font-medium">Transportasi</span>
                    <svg :class="{'rotate-90': open}" class="ml-auto h-4 w-4 transform transition-transform" 
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <div x-show="open" class="ml-4 mt-1 flex flex-col space-y-1">
                    <a href="{{ route('admin.vehicles.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/vehicles*') ? 'bg-amber-700' : '' }}">
                        Vehicles
                    </a>
                    <a href="{{ route('admin.transport_reservations.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/transport_reservations*') ? 'bg-amber-700' : '' }}">
                        Transport Reservations
                    </a>
                </div>
            </div>

            <!-- Event Kami dengan Submenu -->
            <div x-data="{ open: {{ request()->is('admin/kalender*') || request()->is('admin/highlight*') ? 'true' : 'false' }} }" class="mb-2">
                <button @click="open = !open"
                        class="flex items-center w-full px-6 py-3 rounded-lg hover:bg-amber-700 transition-colors 
                            {{ request()->is('admin/kalender*') || request()->is('admin/highlight*') ? 'bg-amber-700' : '' }}">
                    <span class="ml-2 font-medium">Event Kami</span>
                    <svg :class="{'rotate-90': open}" class="ml-auto h-4 w-4 transform transition-transform" 
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <!-- Submenu -->
                <div x-show="open" class="ml-4 mt-1 flex flex-col space-y-1">
                    <a href="{{ route('admin.kalender.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors 
                        {{ request()->is('admin/kalender*') ? 'bg-amber-700' : '' }}">
                        Kalender Kegiatan
                    </a>
                    <a href="{{ route('admin.highlight.index') }}"
                    class="flex items-center px-4 py-2 rounded-lg hover:bg-amber-700 transition-colors 
                        {{ request()->is('admin/highlight*') ? 'bg-amber-700' : '' }}">
                        Highlight
                    </a>
                </div>
            </div>

        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <div class="bg-white rounded-2xl shadow-lg p-6">
            @yield('content')
        </div>
    </main>

</body>
</html>
