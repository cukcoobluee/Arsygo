@extends('admin.layout.layout')

@section('title', 'Hotels')

@section('content')

<div class="space-y-8">

    <!-- HERO HEADER -->
    <div
        class="relative overflow-hidden rounded-[36px]
        bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900
        p-8 lg:p-10 shadow-[0_25px_80px_-20px_rgba(15,23,42,0.45)]">

        <!-- GLOW -->
        <div class="absolute -top-24 right-0 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

            <!-- LEFT -->
            <div>

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                    bg-white/10 border border-white/10 backdrop-blur-xl mb-6">

                    <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>

                    <span class="text-xs font-bold tracking-[0.25em] uppercase text-white/80">
                        Hotel Management
                    </span>

                </div>

                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tight">
                    Hotels <br class="hidden lg:block">
                    Dashboard
                </h1>

                <p class="mt-5 text-slate-300 text-sm lg:text-base leading-relaxed max-w-2xl">
                    Manage hotel listings, update accommodation information,
                    and organize hotel management with a modern premium dashboard interface.
                </p>

            </div>

            <!-- RIGHT STATS -->
            <div class="grid grid-cols-2 gap-4 min-w-[320px]">

                <!-- TOTAL -->
                <div
                    class="rounded-3xl border border-white/10
                    bg-white/10 backdrop-blur-2xl p-5">

                    <p class="text-xs uppercase tracking-[0.2em] font-bold text-slate-300">
                        Total Hotels
                    </p>

                    <h3 class="mt-3 text-4xl font-black text-white">
                        {{ $hotels->count() }}
                    </h3>

                </div>

                <!-- ACTIVE -->
                <div
                    class="rounded-3xl border border-emerald-400/10
                    bg-emerald-500/10 backdrop-blur-2xl p-5">

                    <p class="text-xs uppercase tracking-[0.2em] font-bold text-emerald-200">
                        Active Data
                    </p>

                    <h3 class="mt-3 text-4xl font-black text-white">
                        {{ $hotels->count() }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- SUCCESS ALERT -->
    @if(session('success'))

    <div
        class="flex items-center gap-4 rounded-3xl
        border border-emerald-200 bg-emerald-50
        px-6 py-5">

        <div
            class="w-12 h-12 rounded-2xl
            bg-emerald-500 text-white
            flex items-center justify-center font-bold">

            ✓

        </div>

        <div>

            <h4 class="font-bold text-emerald-800">
                Success Notification
            </h4>

            <p class="text-sm text-emerald-700 mt-1">
                {{ session('success') }}
            </p>

        </div>

    </div>

    @endif

    <!-- TOP ACTION -->
    <div
        class="rounded-[32px]
        bg-white border border-slate-200/70
        shadow-[0_15px_60px_-20px_rgba(15,23,42,0.08)]
        p-6 lg:p-7">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

            <!-- LEFT -->
            <div>

                <p class="text-xs uppercase tracking-[0.25em] font-black text-slate-400 mb-3">
                    Hotel Directory
                </p>

                <h2 class="text-2xl font-black text-slate-900 tracking-tight">
                    Manage Hotel Data
                </h2>

                <p class="text-sm text-slate-500 mt-2">
                    Organize all hotel listings in one elegant dashboard.
                </p>

            </div>

            <!-- BUTTON -->
            <div>

                <a href="{{ route('admin.hotels.create') }}"
                    class="inline-flex items-center gap-3
                    h-14 px-7 rounded-2xl
                    bg-gradient-to-r from-emerald-500 to-emerald-600
                    hover:from-emerald-600 hover:to-emerald-700
                    text-white font-bold text-sm
                    shadow-xl shadow-emerald-500/20
                    hover:scale-[1.02]
                    transition-all duration-300">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4" />

                    </svg>

                    Tambah Hotel

                </a>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div
        class="overflow-hidden rounded-[36px]
        border border-slate-200/70
        bg-white
        shadow-[0_20px_70px_-20px_rgba(15,23,42,0.10)]">

        <!-- TABLE HEADER -->
        <div
            class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6
            px-8 py-7 border-b border-slate-100">

            <div>

                <h2 class="text-2xl font-black text-slate-900 tracking-tight">
                    Hotel List
                </h2>

                <p class="text-sm text-slate-500 mt-2">
                    Premium hotel management table with modern interface.
                </p>

            </div>

            <!-- SEARCH -->
            <div class="relative w-full lg:w-[320px]">

                <input
                    type="text"
                    placeholder="Search hotel..."
                    class="w-full h-13 pl-12 pr-5 rounded-2xl
                    bg-slate-50 border border-slate-200
                    text-sm text-slate-700
                    placeholder:text-slate-400
                    focus:outline-none
                    focus:ring-4 focus:ring-cyan-100
                    focus:border-cyan-300
                    transition-all duration-300">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z" />

                </svg>

            </div>

        </div>

        <!-- TABLE CONTENT -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <thead>

                    <tr class="bg-slate-50 border-b border-slate-100">

                        <th
                            class="px-8 py-5 text-left
                            text-[11px] font-black uppercase
                            tracking-[0.2em] text-slate-400">

                            No
                        </th>

                        <th
                            class="px-6 py-5 text-left
                            text-[11px] font-black uppercase
                            tracking-[0.2em] text-slate-400">

                            Hotel Name
                        </th>

                        <th
                            class="px-6 py-5 text-left
                            text-[11px] font-black uppercase
                            tracking-[0.2em] text-slate-400">

                            Location
                        </th>

                        <th
                            class="px-6 py-5 text-center
                            text-[11px] font-black uppercase
                            tracking-[0.2em] text-slate-400">

                            Price
                        </th>

                        <th
                            class="px-8 py-5 text-center
                            text-[11px] font-black uppercase
                            tracking-[0.2em] text-slate-400">

                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($hotels as $h)

                    <tr
                        class="group hover:bg-slate-50/70 transition-all duration-300">

                        <!-- NUMBER -->
                        <td class="px-8 py-6">

                            <div
                                class="w-12 h-12 rounded-2xl
                                bg-slate-100 text-slate-700
                                flex items-center justify-center
                                font-black text-sm">

                                {{ $loop->iteration }}

                            </div>

                        </td>

                        <!-- HOTEL -->
                        <td class="px-6 py-6">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-14 h-14 rounded-2xl
                                    bg-gradient-to-br from-cyan-500 to-blue-600
                                    text-white flex items-center justify-center
                                    shadow-lg shadow-cyan-500/20">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4" />

                                    </svg>

                                </div>

                                <div>

                                    <h3 class="font-bold text-slate-900 text-base">
                                        {{ $h->nama }}
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Hotel Premium
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- LOCATION -->
                        <td class="px-6 py-6">

                            <div
                                class="inline-flex items-center gap-2
                                px-4 py-2 rounded-2xl
                                bg-slate-100 text-slate-700
                                text-sm font-semibold">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />

                                </svg>

                                {{ $h->lokasi }}

                            </div>

                        </td>

                        <!-- PRICE -->
                        <td class="px-6 py-6 text-center">

                            <div
                                class="inline-flex items-center
                                px-5 py-2 rounded-2xl
                                bg-emerald-50 text-emerald-700
                                border border-emerald-100
                                text-sm font-black">

                                Rp {{ number_format($h->harga,0,',','.') }}

                            </div>

                        </td>

                        <!-- ACTION -->
                        <td class="px-8 py-6">

                            <div class="flex items-center justify-center gap-3">

                                <!-- EDIT -->
                                <a href="{{ route('admin.hotels.edit', $h->id) }}"
                                    class="h-11 px-5 rounded-2xl
                                    bg-amber-500 hover:bg-amber-600
                                    text-white text-sm font-bold
                                    shadow-lg shadow-amber-500/20
                                    hover:scale-105
                                    transition-all duration-300">

                                    Edit

                                </a>

                                <!-- DELETE -->
                                <form
                                    action="{{ route('admin.hotels.destroy', $h->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus hotel?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="h-11 px-5 rounded-2xl
                                        bg-red-500 hover:bg-red-600
                                        text-white text-sm font-bold
                                        shadow-lg shadow-red-500/20
                                        hover:scale-105
                                        transition-all duration-300">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="py-28 text-center">

                            <div class="flex flex-col items-center">

                                <div
                                    class="w-24 h-24 rounded-full
                                    bg-slate-100 flex items-center justify-center mb-6">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-10 h-10 text-slate-400"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4" />

                                    </svg>

                                </div>

                                <h3 class="text-2xl font-black text-slate-700">
                                    No Hotel Data
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    Hotel data will appear here later.
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div
            class="px-8 py-6 border-t border-slate-100
            bg-slate-50/60">

            {{ $hotels->links() }}

        </div>

    </div>

</div>

@endsection