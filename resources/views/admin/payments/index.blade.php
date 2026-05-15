@extends('admin.layout.layout')

@section('title', 'Payments')

@section('content')

<div
    x-data="{
        statusFilter: 'all',
        tripFilter: 'all'
    }"
    class="space-y-8">

    <!-- HERO HEADER -->
    <div
        class="relative overflow-hidden rounded-[36px]
        bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900
        p-8 lg:p-10 shadow-[0_20px_80px_-20px_rgba(15,23,42,0.45)]">

        <!-- BLUR EFFECT -->
        <div class="absolute -top-24 -right-20 w-72 h-72 bg-emerald-500/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 left-0 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex flex-col xl:flex-row xl:items-center xl:justify-between gap-8">

            <!-- LEFT -->
            <div>

                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full
                    bg-white/10 border border-white/10 backdrop-blur-xl mb-6">

                    <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>

                    <span class="text-xs font-bold tracking-[0.25em] uppercase text-white/80">
                        Payment Center
                    </span>

                </div>

                <h1 class="text-4xl lg:text-5xl font-black tracking-tight text-white leading-tight">
                    Payment <br class="hidden lg:block">
                    Management
                </h1>

                <p class="mt-5 text-slate-300 text-sm lg:text-base max-w-2xl leading-relaxed">
                    Monitor payment transactions, manage confirmations,
                    and organize customer booking payments with a premium dashboard experience.
                </p>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-2 gap-4 min-w-[300px]">

                <!-- TOTAL -->
                <div
                    class="rounded-3xl border border-white/10
                    bg-white/10 backdrop-blur-2xl
                    p-5">

                    <p class="text-xs uppercase tracking-[0.2em] font-bold text-slate-300">
                        Total Data
                    </p>

                    <h3 class="mt-3 text-4xl font-black text-white">
                        {{ count($payments) }}
                    </h3>

                </div>

                <!-- PAID -->
                <div
                    class="rounded-3xl border border-emerald-400/10
                    bg-emerald-500/10 backdrop-blur-2xl
                    p-5">

                    <p class="text-xs uppercase tracking-[0.2em] font-bold text-emerald-200">
                        Paid
                    </p>

                    <h3 class="mt-3 text-4xl font-black text-white">
                        {{ $payments->where('status', 'lunas')->count() }}
                    </h3>

                </div>

            </div>

        </div>

    </div>

    <!-- FILTER -->
    <div
        class="rounded-[32px]
        bg-white border border-slate-200/70
        shadow-[0_10px_50px_-15px_rgba(15,23,42,0.08)]
        p-7">

        <div class="flex flex-col 2xl:flex-row gap-8 2xl:items-center 2xl:justify-between">

            <!-- STATUS -->
            <div>

                <p class="text-xs font-black uppercase tracking-[0.25em] text-slate-400 mb-4">
                    Filter Status
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

                    <!-- PAID -->
                    <button
                        @click="statusFilter = 'lunas'"
                        :class="statusFilter === 'lunas'
                        ? 'bg-emerald-500 text-white shadow-xl shadow-emerald-500/20 scale-105'
                        : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        Paid
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

                </div>

            </div>

            <!-- TRIP -->
            <div>

                <p class="text-xs font-black uppercase tracking-[0.25em] text-slate-400 mb-4">
                    Filter Trip
                </p>

                <div class="flex flex-wrap items-center gap-3">

                    <!-- ALL -->
                    <button
                        @click="tripFilter = 'all'"
                        :class="tripFilter === 'all'
                        ? 'bg-slate-900 text-white shadow-xl shadow-slate-900/10 scale-105'
                        : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        Semua Trip
                    </button>

                    @php
                        $trips = $payments->pluck('kategori_trip')->unique();
                    @endphp

                    @foreach($trips as $trip)

                    <button
                        @click="tripFilter = '{{ strtolower($trip) }}'"
                        :class="tripFilter === '{{ strtolower($trip) }}'
                        ? 'bg-cyan-500 text-white shadow-xl shadow-cyan-500/20 scale-105'
                        : 'bg-cyan-50 text-cyan-700 hover:bg-cyan-100'"
                        class="h-12 px-6 rounded-2xl text-sm font-bold transition-all duration-300">

                        {{ $trip }}

                    </button>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div
        class="overflow-hidden rounded-[36px]
        border border-slate-200/70
        bg-white
        shadow-[0_20px_70px_-20px_rgba(15,23,42,0.10)]">

        <!-- TABLE TOP -->
        <div
            class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6
            px-8 py-7 border-b border-slate-100">

            <div>

                <h2 class="text-2xl font-black tracking-tight text-slate-900">
                    Transaction List
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Manage all payment transaction activity.
                </p>

            </div>

            <!-- SEARCH -->
            <div class="relative w-full xl:w-[360px]">

                <input
                    type="text"
                    placeholder="Search transaction..."
                    class="w-full h-14 pl-14 pr-5 rounded-2xl
                    bg-slate-50 border border-slate-200
                    text-sm text-slate-700
                    placeholder:text-slate-400
                    focus:outline-none
                    focus:ring-4 focus:ring-emerald-100
                    focus:border-emerald-300
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

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1250px]">

                <thead>

                    <tr class="bg-slate-50 border-b border-slate-100">

                        <th class="px-8 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Customer
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Trip
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Participants
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Total
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Date
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Status
                        </th>

                        <th class="px-6 py-5 text-left text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Proof
                        </th>

                        <th class="px-8 py-5 text-center text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($payments as $p)

                    <tr
                        x-show="
                        (statusFilter === 'all' || '{{ strtolower($p->status) }}' === statusFilter)
                        &&
                        (tripFilter === 'all' || '{{ strtolower($p->kategori_trip) }}' === tripFilter)
                        "
                        x-transition
                        class="group hover:bg-slate-50/80 transition-all duration-300">

                        <!-- CUSTOMER -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-4">

                                <div
                                    class="relative w-14 h-14 rounded-2xl
                                    bg-gradient-to-br from-emerald-500 to-cyan-500
                                    flex items-center justify-center
                                    text-white font-black text-lg
                                    shadow-lg shadow-emerald-500/20">

                                    {{ strtoupper(substr($p->nama, 0, 1)) }}

                                    <div class="absolute inset-0 rounded-2xl border border-white/20"></div>

                                </div>

                                <div>

                                    <h3 class="font-bold text-slate-900">
                                        {{ $p->nama }}
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        {{ $p->telepon }}
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- TRIP -->
                        <td class="px-6 py-6">

                            <div
                                class="inline-flex items-center px-4 py-2 rounded-2xl
                                bg-slate-100 text-slate-700 text-sm font-bold">

                                {{ $p->kategori_trip }}

                            </div>

                        </td>

                        <!-- PARTICIPANTS -->
                        <td class="px-6 py-6">

                            <span class="text-sm font-semibold text-slate-700">
                                {{ $p->jumlah_peserta }} Orang
                            </span>

                        </td>

                        <!-- TOTAL -->
                        <td class="px-6 py-6">

                            <h3 class="text-xl font-black text-slate-900">
                                Rp {{ number_format($p->total_bayar,0,',','.') }}
                            </h3>

                        </td>

                        <!-- DATE -->
                        <td class="px-6 py-6">

                            <span class="text-sm text-slate-600">
                                {{ $p->tanggal }}
                            </span>

                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-6">

                            @if($p->status == 'lunas')

                            <div
                                class="inline-flex items-center gap-2
                                px-4 py-2 rounded-full
                                bg-emerald-50 border border-emerald-200">

                                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>

                                <span class="text-xs font-black uppercase tracking-wide text-emerald-700">
                                    Paid
                                </span>

                            </div>

                            @elseif($p->status == 'pending')

                            <div
                                class="inline-flex items-center gap-2
                                px-4 py-2 rounded-full
                                bg-amber-50 border border-amber-200">

                                <div class="w-2 h-2 rounded-full bg-amber-500"></div>

                                <span class="text-xs font-black uppercase tracking-wide text-amber-700">
                                    Pending
                                </span>

                            </div>

                            @else

                            <div
                                class="inline-flex items-center gap-2
                                px-4 py-2 rounded-full
                                bg-slate-100 border border-slate-200">

                                <div class="w-2 h-2 rounded-full bg-slate-500"></div>

                                <span class="text-xs font-black uppercase tracking-wide text-slate-700">
                                    Unpaid
                                </span>

                            </div>

                            @endif

                        </td>

                        <!-- PROOF -->
                        <td class="px-6 py-6">

                            @if($p->bukti_pembayaran)

                            <a
                                href="{{ asset('uploads/bukti/'.$p->bukti_pembayaran) }}"
                                target="_blank"
                                class="block">

                                <img
                                    src="{{ asset('uploads/bukti/'.$p->bukti_pembayaran) }}"
                                    class="w-20 h-20 object-cover rounded-2xl
                                    border border-slate-200
                                    shadow-md
                                    group-hover:scale-105
                                    transition-all duration-300">

                            </a>

                            @else

                            <div
                                class="w-20 h-20 rounded-2xl
                                border border-dashed border-slate-300
                                bg-slate-100
                                flex items-center justify-center">

                                <span class="text-[11px] text-slate-400 font-semibold">
                                    Empty
                                </span>

                            </div>

                            @endif

                        </td>

                        <!-- ACTION -->
                        <td class="px-8 py-6">

                            <div class="flex items-center justify-center gap-2">

                                <!-- PAID -->
                                <form action="{{ route('admin.payments.updateStatus', $p->id) }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="status" value="lunas">

                                    <button
                                        class="h-11 px-5 rounded-2xl
                                        bg-emerald-500 hover:bg-emerald-600
                                        text-white text-xs font-black
                                        shadow-lg shadow-emerald-500/20
                                        hover:scale-105
                                        transition-all duration-300">

                                        Paid
                                    </button>

                                </form>

                                <!-- PENDING -->
                                <form action="{{ route('admin.payments.updateStatus', $p->id) }}" method="POST">

                                    @csrf

                                    <input type="hidden" name="status" value="pending">

                                    <button
                                        class="h-11 px-5 rounded-2xl
                                        bg-amber-500 hover:bg-amber-600
                                        text-white text-xs font-black
                                        shadow-lg shadow-amber-500/20
                                        hover:scale-105
                                        transition-all duration-300">

                                        Pending
                                    </button>

                                </form>

                                <!-- DELETE -->
                                <form
                                    action="{{ route('admin.payments.delete', $p->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin mau menghapus data ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
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

                        <td colspan="8" class="py-28 text-center">

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
                                            d="M17 9V7a5 5 0 00-10 0v2m-2 0h14l1 12H4L5 9z" />

                                    </svg>

                                </div>

                                <h3 class="text-2xl font-black text-slate-700">
                                    No Payment Data
                                </h3>

                                <p class="mt-2 text-sm text-slate-500">
                                    Payment transactions will appear here later.
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