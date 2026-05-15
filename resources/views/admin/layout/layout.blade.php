<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="icon" href="{{ asset('img/arsygo-logo.png') }}" type="image/png">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Lucide -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #d4d4d8;
            border-radius: 999px;
        }
    </style>
</head>

<body class="bg-[#f6f8fb] text-slate-800">

    <!-- Mobile Overlay -->
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        class="fixed inset-0 bg-black/30 z-40 lg:hidden"
        @click="sidebarOpen = false"
        x-cloak>
    </div>

    <!-- SIDEBAR -->
    <aside
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed top-0 left-0 z-50 w-72 h-screen transition-all duration-300 lg:translate-x-0">

        <div class="h-full bg-white border-r border-slate-200 flex flex-col">

            <!-- Logo -->
            <div class="h-20 px-6 flex items-center border-b border-slate-100">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-2xl bg-amber-100 flex items-center justify-center">
                        <img
                            src="{{ asset('img/arsygo-logo.png') }}"
                            class="w-7 h-7 object-contain"
                            alt="Logo">
                    </div>

                    <div>
                        <h1 class="font-semibold text-slate-900">
                            Arsygo Admin
                        </h1>

                        <p class="text-xs text-slate-500">
                            Management System
                        </p>
                    </div>

                </div>
            </div>

            <!-- Menu -->
            <div class="flex-1 overflow-y-auto px-4 py-6">

                <p class="text-[11px] uppercase tracking-[0.2em] text-slate-400 px-3 mb-4">
                    Main Menu
                </p>

                <nav class="space-y-2">

                    <!-- Dashboard -->
                    <a href="{{ url('/admin') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                        {{ request()->is('admin')
                            ? 'bg-amber-50 text-amber-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>

                        Dashboard
                    </a>

                    <!-- Testimonials -->
                    <a href="{{ url('/admin/testimonials') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                        {{ request()->is('admin/testimonials*')
                            ? 'bg-amber-50 text-amber-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        <i data-lucide="message-square-text" class="w-4 h-4"></i>

                        Testimonials
                    </a>

                    <!-- Payments -->
                    <a href="{{ url('/admin/payments') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                        {{ request()->is('admin/payments*')
                            ? 'bg-amber-50 text-amber-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        <i data-lucide="wallet" class="w-4 h-4"></i>

                        Payments
                    </a>

                    <!-- Open Trip -->
                    <a href="{{ route('admin.bookings.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                        {{ request()->is('admin/bookings*')
                            ? 'bg-amber-50 text-amber-600'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                        <i data-lucide="plane" class="w-4 h-4"></i>

                        Open Trip
                    </a>

                    <!-- Divider -->
                    <div class="pt-4 pb-2">
                        <div class="border-t border-slate-200"></div>
                    </div>

                    <!-- HOTELS -->
                    <div
                        x-data="{ open: {{ request()->is('admin/hotels*') || request()->is('admin/hotel_bookings*') ? 'true' : 'false' }} }">

                        <button
                            @click="open = !open"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                            {{ request()->is('admin/hotels*') || request()->is('admin/hotel_bookings*')
                                ? 'bg-slate-100 text-slate-900'
                                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                            <i data-lucide="hotel" class="w-4 h-4"></i>

                            <span class="flex-1 text-left">
                                Hotels
                            </span>

                            <i
                                data-lucide="chevron-down"
                                class="w-4 h-4 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''">
                            </i>
                        </button>

                        <!-- Submenu -->
                        <div
                            x-show="open"
                            x-transition
                            x-cloak
                            class="mt-2 ml-4 pl-4 border-l border-slate-200 space-y-1">

                            <a href="{{ route('admin.hotels.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200
                                {{ request()->is('admin/hotels')
                                    ? 'bg-amber-50 text-amber-600'
                                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' }}">

                                <i data-lucide="building-2" class="w-4 h-4"></i>

                                Hotels
                            </a>

                            <a href="{{ route('admin.hotel_bookings.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200
                                {{ request()->is('admin/hotel_bookings*')
                                    ? 'bg-amber-50 text-amber-600'
                                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' }}">

                                <i data-lucide="book-check" class="w-4 h-4"></i>

                                Bookings
                            </a>
                        </div>
                    </div>

                    <!-- TRANSPORT -->
                    <div
                        x-data="{ open: {{ request()->is('admin/vehicles*') || request()->is('admin/transport_reservations*') ? 'true' : 'false' }} }">

                        <button
                            @click="open = !open"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                            {{ request()->is('admin/vehicles*') || request()->is('admin/transport_reservations*')
                                ? 'bg-slate-100 text-slate-900'
                                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                            <i data-lucide="car-front" class="w-4 h-4"></i>

                            <span class="flex-1 text-left">
                                Transportasi
                            </span>

                            <i
                                data-lucide="chevron-down"
                                class="w-4 h-4 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''">
                            </i>
                        </button>

                        <!-- Submenu -->
                        <div
                            x-show="open"
                            x-transition
                            x-cloak
                            class="mt-2 ml-4 pl-4 border-l border-slate-200 space-y-1">

                            <a href="{{ route('admin.vehicles.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200
                                {{ request()->is('admin/vehicles*')
                                    ? 'bg-amber-50 text-amber-600'
                                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' }}">

                                <i data-lucide="bus" class="w-4 h-4"></i>

                                Vehicles
                            </a>

                            <a href="{{ route('admin.transport_reservations.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200
                                {{ request()->is('admin/transport_reservations*')
                                    ? 'bg-amber-50 text-amber-600'
                                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' }}">

                                <i data-lucide="clipboard-check" class="w-4 h-4"></i>

                                Reservations
                            </a>
                        </div>
                    </div>

                    <!-- EVENT -->
                    <div
                        x-data="{ open: {{ request()->is('admin/kalender*') || request()->is('admin/highlight*') ? 'true' : 'false' }} }">

                        <button
                            @click="open = !open"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-medium transition-all duration-200
                            {{ request()->is('admin/kalender*') || request()->is('admin/highlight*')
                                ? 'bg-slate-100 text-slate-900'
                                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">

                            <i data-lucide="calendar-range" class="w-4 h-4"></i>

                            <span class="flex-1 text-left">
                                Event Kami
                            </span>

                            <i
                                data-lucide="chevron-down"
                                class="w-4 h-4 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''">
                            </i>
                        </button>

                        <!-- Submenu -->
                        <div
                            x-show="open"
                            x-transition
                            x-cloak
                            class="mt-2 ml-4 pl-4 border-l border-slate-200 space-y-1">

                            <a href="{{ route('admin.kalender.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200
                                {{ request()->is('admin/kalender*')
                                    ? 'bg-amber-50 text-amber-600'
                                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' }}">

                                <i data-lucide="calendar-days" class="w-4 h-4"></i>

                                Kalender
                            </a>

                            <a href="{{ route('admin.highlight.index') }}"
                                class="flex items-center gap-3 px-3 py-2 rounded-xl text-sm transition-all duration-200
                                {{ request()->is('admin/highlight*')
                                    ? 'bg-amber-50 text-amber-600'
                                    : 'text-slate-500 hover:bg-slate-100 hover:text-slate-900' }}">

                                <i data-lucide="sparkles" class="w-4 h-4"></i>

                                Highlight
                            </a>
                        </div>
                    </div>

                </nav>
            </div>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="lg:ml-72 min-h-screen">

        <!-- TOPBAR -->
        <header class="sticky top-0 z-30 bg-[#f6f8fb]/90 backdrop-blur border-b border-slate-200">

            <div class="h-20 px-4 lg:px-8 flex items-center justify-between">

                <!-- Left -->
                <div class="flex items-center gap-4">

                    <!-- Mobile Button -->
                    <button
                        @click="sidebarOpen = true"
                        class="lg:hidden w-11 h-11 rounded-xl border border-slate-200 bg-white flex items-center justify-center">

                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>

                    <!-- Search -->
                    <div class="hidden md:flex items-center gap-3 w-[320px] h-11 px-4 rounded-2xl bg-white border border-slate-200">

                        <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>

                        <input
                            type="text"
                            placeholder="Search..."
                            class="w-full bg-transparent outline-none text-sm placeholder:text-slate-400">
                    </div>
                </div>

                <!-- Right -->
                <div class="flex items-center gap-3">

                    <!-- Notification -->
                    <button class="relative w-11 h-11 rounded-xl border border-slate-200 bg-white flex items-center justify-center hover:bg-slate-50 transition">

                        <i data-lucide="bell" class="w-5 h-5 text-slate-600"></i>

                        <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-amber-500"></span>
                    </button>

                    <!-- Profile -->
                    <div class="flex items-center gap-3 bg-white border border-slate-200 rounded-2xl px-3 py-2">

                        <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600 font-semibold">
                            A
                        </div>

                        <div class="hidden md:block">
                            <h4 class="text-sm font-semibold text-slate-800">
                                Administrator
                            </h4>

                            <p class="text-xs text-slate-500">
                                Super Admin
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </header>

        <!-- CONTENT -->
        <section class="p-4 lg:p-8">

            <div class="bg-white border border-slate-200 rounded-3xl shadow-sm p-6 lg:p-8 min-h-[calc(100vh-180px)]">

                <!-- Content -->
                @yield('content')

            </div>

            <!-- Footer -->
            <footer class="mt-6">

                <div class="flex flex-col md:flex-row items-center justify-between gap-3 px-2">

                    <p class="text-sm text-slate-500">
                        © {{ date('Y') }} Arsygo Admin Panel
                    </p>

                    <div class="flex items-center gap-5 text-sm text-slate-500">
                        <span class="hover:text-slate-800 transition cursor-pointer">
                            Documentation
                        </span>

                        <span class="hover:text-slate-800 transition cursor-pointer">
                            Support
                        </span>

                        <span class="hover:text-slate-800 transition cursor-pointer">
                            Version 2.0
                        </span>
                    </div>

                </div>
            </footer>

        </section>
    </main>

    <script>
        lucide.createIcons();
    </script>

</body>
</html>