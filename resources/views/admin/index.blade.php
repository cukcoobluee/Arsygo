@extends('admin.layout.layout')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>
            <h1 class="text-3xl lg:text-4xl font-black tracking-tight text-slate-900">
                Dashboard Overview
            </h1>

            <p class="mt-2 text-slate-500 text-sm lg:text-base">
                Welcome back!! Monitor your business analytics and management system.
            </p>
        </div>

        <!-- ACTION -->
        <div class="flex items-center gap-3">

            <div class="hidden md:flex items-center gap-2 px-4 py-2 rounded-2xl bg-white/70 backdrop-blur-xl border border-white/40 shadow-sm">
                <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>

                <span class="text-sm font-medium text-slate-600">
                    System Active
                </span>
            </div>

            <a href="{{ url('/admin/testimonials') }}"
                class="inline-flex items-center gap-2 px-5 py-3 rounded-2xl
                bg-gradient-to-r from-amber-400 to-orange-500
                text-white font-semibold shadow-lg shadow-orange-500/20
                hover:scale-[1.02] hover:shadow-xl hover:shadow-orange-500/30
                transition-all duration-300">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-4 4v-4z" />
                </svg>

                Kelola Testimonials
            </a>

        </div>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <!-- TESTIMONIAL -->
        <div
            class="group relative overflow-hidden rounded-3xl
            bg-gradient-to-br from-white to-slate-50
            border border-white/50
            shadow-lg shadow-slate-200/50
            hover:shadow-2xl hover:shadow-slate-300/40
            transition-all duration-500">

            <!-- GLOW -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-amber-200/30 blur-3xl rounded-full"></div>

            <div class="relative p-7">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-semibold tracking-wide uppercase text-slate-500">
                            Total Testimonials
                        </p>

                        <h2 class="mt-4 text-5xl font-black tracking-tight text-slate-900">
                            {{ $testimonialCount ?? 0 }}
                        </h2>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl
                        bg-gradient-to-br from-amber-400 to-orange-500
                        flex items-center justify-center
                        shadow-lg shadow-orange-500/30">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-4 4v-4z" />
                        </svg>

                    </div>

                </div>

                <div class="mt-8 flex items-center justify-between">

                    <div class="flex items-center gap-2 text-emerald-600 text-sm font-semibold">
                        ↑ Active Data
                    </div>

                    <span class="text-sm text-slate-400">
                        Updated today
                    </span>

                </div>

            </div>
        </div>

        <!-- PENDING -->
        <div
            class="group relative overflow-hidden rounded-3xl
            bg-gradient-to-br from-white to-amber-50/50
            border border-white/50
            shadow-lg shadow-amber-100/50
            hover:shadow-2xl hover:shadow-amber-200/40
            transition-all duration-500">

            <div class="absolute top-0 right-0 w-40 h-40 bg-amber-300/20 blur-3xl rounded-full"></div>

            <div class="relative p-7">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-semibold tracking-wide uppercase text-slate-500">
                            Pending Status
                        </p>

                        <h2 class="mt-4 text-5xl font-black tracking-tight text-amber-600">
                            {{ $pendingCount ?? 0 }}
                        </h2>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl
                        bg-gradient-to-br from-yellow-400 to-amber-500
                        flex items-center justify-center
                        shadow-lg shadow-amber-500/30">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4l3 3" />
                        </svg>

                    </div>

                </div>

                <div class="mt-8 flex items-center justify-between">

                    <div class="flex items-center gap-2 text-amber-600 text-sm font-semibold">
                        Waiting Approval
                    </div>

                    <span class="text-sm text-slate-400">
                        Need review
                    </span>

                </div>

            </div>
        </div>

        <!-- APPROVED -->
        <div
            class="group relative overflow-hidden rounded-3xl
            bg-gradient-to-br from-white to-emerald-50/60
            border border-white/50
            shadow-lg shadow-emerald-100/50
            hover:shadow-2xl hover:shadow-emerald-200/40
            transition-all duration-500">

            <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-300/20 blur-3xl rounded-full"></div>

            <div class="relative p-7">

                <div class="flex items-start justify-between">

                    <div>
                        <p class="text-sm font-semibold tracking-wide uppercase text-slate-500">
                            Approved Status
                        </p>

                        <h2 class="mt-4 text-5xl font-black tracking-tight text-emerald-600">
                            {{ $approvedCount ?? 0 }}
                        </h2>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl
                        bg-gradient-to-br from-emerald-400 to-green-500
                        flex items-center justify-center
                        shadow-lg shadow-emerald-500/30">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>

                    </div>

                </div>

                <div class="mt-8 flex items-center justify-between">

                    <div class="flex items-center gap-2 text-emerald-600 text-sm font-semibold">
                        Successfully Approved
                    </div>

                    <span class="text-sm text-slate-400">
                        All good
                    </span>

                </div>

            </div>
        </div>

    </div>

    <!-- EXTRA PANEL -->
    <div
        class="relative overflow-hidden rounded-[32px]
        bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900
        p-8 lg:p-10 shadow-2xl">

        <!-- GLOW -->
        <div class="absolute top-0 right-0 w-72 h-72 bg-orange-500/20 blur-3xl rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

            <div class="max-w-2xl">

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/10 mb-5">

                    <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>

                    <span class="text-sm font-medium text-white/80">
                        Analytics Dashboard
                    </span>

                </div>

                <h2 class="text-3xl lg:text-4xl font-black text-white leading-tight">
                    Manage your Arsygo dashboard with modern analytics experience.
                </h2>

                <p class="mt-4 text-slate-300 leading-relaxed">
                    Monitor testimonials, approvals, booking activity and business management
                    with a clean premium admin panel interface.
                </p>

            </div>

            <div class="flex flex-wrap gap-4">

                <a href="{{ url('/admin/testimonials') }}"
                    class="px-6 py-3 rounded-2xl bg-white text-slate-900 font-semibold hover:scale-[1.03] transition-all duration-300 shadow-lg">

                    Manage Testimonials
                </a>

                <a href="{{ route('admin.bookings.index') }}"
                    class="px-6 py-3 rounded-2xl border border-white/20 text-white font-semibold hover:bg-white/10 transition-all duration-300">

                    View Bookings
                </a>

            </div>

        </div>

    </div>

</div>

@endsection