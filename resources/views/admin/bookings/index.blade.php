@extends('admin.layout.layout')

@section('title', 'Bookings')

@section('content')

<div
    x-data="{
        statusFilter: 'all'
    }"
    class="space-y-8">

    <!-- HERO -->
    <div
        class="relative overflow-hidden rounded-[36px]
        bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900
        p-8 lg:p-10 shadow-[0_20px_80px_-20px_rgba(15,23,42,0.45)]">

        <!-- GLOW -->
        <div class="absolute -top-20 -right-10 w-72 h-72 bg-cyan-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 left-0 w-72 h-72 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

            <!-- LEFT -->
            <div>

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                    bg-white/10 border border-white/10 backdrop-blur-xl mb-6">

                    <div class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></div>

                    <span class="text-xs font-bold tracking-[0.25em] uppercase text-white/80">
                        Booking Management
                    </span>

                </div>

                <h1 class="text-4xl lg:text-5xl font-black tracking-tight text-white leading-tight">
                    Booking <br class="hidden lg:block">
                    Dashboard
                </h1>

                <p class="mt-5 text-slate-300 text-sm lg:text-base max-w-2xl leading-relaxed">
                    Monitor customer bookings, manage reservation status,
                    and organize travel participant data with a premium dashboard experience.
                </p>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-2 gap-4 min-w-[320px]">

                <!-- TOTAL -->
                <div
                    class="rounded-3xl border border-white/10
                    bg-white/10 backdrop-blur-2xl
                    p-5">

                    <p class="text-xs uppercase tracking-[0.2em] font-bold text-slate-300">
                        Total Booking
                    </p>

                    <h3 class="mt-3 text-4xl font-black text-white">
                        {{ count($bookings) }}
                    </h3>

                </div>

                <!-- APPROVED -->
                <div
                    class="rounded-3xl border border-emerald-400/10
                    bg-emerald-500/10 backdrop-blur-2xl
                    p-5">

                    <p class="text-xs uppercase tracking-[0.2em] font-bold text-emerald-200">
                        Approved
                    </p>

                    <h3 class="mt-3 text-4xl font-black text-white">
                        {{ $bookings->where('status', 'approved')->count() }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- SUCCESS -->
    @if(session('success'))

    <div
        class="flex items-center gap-4
        rounded-3xl border border-emerald-200
        bg-emerald-50 px-6 py-5">

        <div
            class="w-12 h-12 rounded-2xl
            bg-emerald-500 text-white
            flex items-center justify-center">

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

    <!-- FILTER -->
    <div
        class="rounded-[32px]
        bg-white border border-slate-200/70
        shadow-[0_10px_50px_-15px_rgba(15,23,42,0.08)]
        p-7">

        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

            <!-- LEFT -->
            <div>

                <p class="text-xs font-black uppercase tracking-[0.25em] text-slate-400 mb-4">
                    Filter Booking Status
                </p>

                <div class="flex flex-wrap items-center gap-3">

                    <!-- ALL -->
                    <button
                        @click="statusFilter = 'all'"
                        :class="statusFilter === 'all'
                        ? 'bg-slate-900 text-white shadow-xl shadow-slate-900/10 scale-105'
                        : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        Semua
                    </button>

                    <!-- PENDING -->
                    <button
                        @click="statusFilter = 'pending'"
                        :class="statusFilter === 'pending'
                        ? 'bg-amber-500 text-white shadow-xl shadow-amber-500/20 scale-105'
                        : 'bg-amber-50 text-amber-700 hover:bg-amber-100'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        Pending
                    </button>

                    <!-- APPROVED -->
                    <button
                        @click="statusFilter = 'approved'"
                        :class="statusFilter === 'approved'
                        ? 'bg-emerald-500 text-white shadow-xl shadow-emerald-500/20 scale-105'
                        : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        Approved
                    </button>

                    <!-- REJECTED -->
                    <button
                        @click="statusFilter = 'rejected'"
                        :class="statusFilter === 'rejected'
                        ? 'bg-red-500 text-white shadow-xl shadow-red-500/20 scale-105'
                        : 'bg-red-50 text-red-700 hover:bg-red-100'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        Rejected
                    </button>

                </div>

            </div>

            <!-- SEARCH -->
            <div class="relative w-full xl:w-[360px]">

                <input
                    type="text"
                    placeholder="Search booking..."
                    class="w-full h-14 pl-14 pr-5 rounded-2xl
                    bg-slate-50 border border-slate-200
                    text-sm text-slate-700
                    placeholder:text-slate-400
                    focus:outline-none
                    focus:ring-4 focus:ring-cyan-100
                    focus:border-cyan-300
                    transition-all duration-300">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-slate-400 absolute left-5 top-1/2 -translate-y-1/2"
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

    </div>

    <!-- TABLE -->
    <div
        class="overflow-hidden rounded-[36px]
        border border-slate-200/70
        bg-white
        shadow-[0_20px_70px_-20px_rgba(15,23,42,0.10)]">

        <!-- TABLE HEADER -->
        <div
            class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6
            px-8 py-7 border-b border-slate-100">

            <div>

                <h2 class="text-2xl font-black tracking-tight text-slate-900">
                    Booking List
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Manage all customer reservation data easily.
                </p>

            </div>

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1300px]">

                <thead>

                    <tr class="bg-slate-50 border-b border-slate-100">

                        <th class="px-8 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Customer
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Email
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Participants
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Date
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Notes
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Status
                        </th>

                        <th class="px-8 py-5 text-center text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($bookings as $booking)

                    <tr
                        x-show="statusFilter === 'all' || '{{ strtolower($booking->status) }}' === statusFilter"
                        x-transition
                        class="group hover:bg-slate-50/80 transition-all duration-300">

                        <!-- CUSTOMER -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-4">

                                <div
                                    class="relative w-14 h-14 rounded-2xl
                                    bg-gradient-to-br from-cyan-500 to-blue-500
                                    flex items-center justify-center
                                    text-white font-black text-lg
                                    shadow-lg shadow-cyan-500/20">

                                    {{ strtoupper(substr($booking->nama, 0, 1)) }}

                                </div>

                                <div>

                                    <h3 class="font-bold text-slate-900">
                                        {{ $booking->nama }}
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        {{ $booking->telepon }}
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- EMAIL -->
                        <td class="px-6 py-6">

                            <span class="text-sm text-slate-600">
                                {{ $booking->email }}
                            </span>

                        </td>

                        <!-- PARTICIPANTS -->
                        <td class="px-6 py-6">

                            <div
                                class="inline-flex items-center
                                px-4 py-2 rounded-2xl
                                bg-slate-100 text-slate-700
                                text-sm font-bold">

                                {{ $booking->jumlah_peserta }} Orang

                            </div>

                        </td>

                        <!-- DATE -->
                        <td class="px-6 py-6">

                            <span class="text-sm font-medium text-slate-700">
                                {{ \Carbon\Carbon::parse($booking->tanggal)->format('d M Y') }}
                            </span>

                        </td>

                        <!-- NOTES -->
                        <td class="px-6 py-6 max-w-[250px]">

                            @if(strlen($booking->catatan ?? '') > 5)

                            <div
                                x-data="{ expanded: false }"
                                class="space-y-2">

                                <p
                                    x-bind:class="expanded ? '' : 'line-clamp-2'"
                                    class="text-sm leading-relaxed text-slate-600">

                                    {{ $booking->catatan }}

                                </p>

                                <button
                                    @click="expanded = !expanded"
                                    class="text-cyan-600 hover:text-cyan-700 text-xs font-bold transition">

                                    <span x-show="!expanded">Read More</span>
                                    <span x-show="expanded">Show Less</span>

                                </button>

                            </div>

                            @else

                            <span class="text-sm text-slate-400">
                                -
                            </span>

                            @endif

                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-6">

                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <select
                                    name="status"
                                    onchange="this.form.submit()"
                                    class="h-11 px-4 rounded-2xl
                                    border border-slate-200
                                    bg-white
                                    text-sm font-bold
                                    focus:ring-4 focus:ring-cyan-100
                                    focus:border-cyan-300
                                    outline-none transition-all duration-300

                                    @if($booking->status == 'approved')
                                    text-emerald-700 bg-emerald-50 border-emerald-200
                                    @elseif($booking->status == 'pending')
                                    text-amber-700 bg-amber-50 border-amber-200
                                    @else
                                    text-red-700 bg-red-50 border-red-200
                                    @endif">

                                    <option value="pending"
                                        {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="approved"
                                        {{ $booking->status == 'approved' ? 'selected' : '' }}>
                                        Approved
                                    </option>

                                    <option value="rejected"
                                        {{ $booking->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>

                                </select>

                            </form>

                        </td>

                        <!-- ACTION -->
                        <td class="px-8 py-6">

                            <div class="flex items-center justify-center">

                                <form
                                    action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin mau hapus?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="h-11 px-5 rounded-2xl
                                        bg-red-500 hover:bg-red-600
                                        text-white text-xs font-black
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

                        <td colspan="7" class="py-28 text-center">

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
                                            d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z" />

                                    </svg>

                                </div>

                                <h3 class="text-2xl font-black text-slate-700">
                                    No Booking Data
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    Booking data will appear here later.
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection