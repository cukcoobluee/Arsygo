@extends('admin.layout.layout')

@section('title', 'Testimonials')

@section('content')

<div class="space-y-7">

    <!-- HEADER -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-50 border border-amber-100 mb-4">

                <div class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></div>

                <span class="text-xs font-semibold tracking-wide text-amber-700 uppercase">
                    Testimonials Dashboard
                </span>

            </div>

            <h1 class="text-3xl lg:text-4xl font-black tracking-tight text-slate-900">
                Customer Testimonials
            </h1>

            <p class="mt-2 text-slate-500 text-sm lg:text-base">
                Manage customer feedback, approvals and reviews professionally.
            </p>
        </div>

        <!-- STATS -->
        <div class="flex items-center gap-4">

            <div class="px-5 py-4 rounded-3xl bg-white/80 backdrop-blur-xl border border-white/50 shadow-lg shadow-slate-200/40">

                <p class="text-xs uppercase tracking-wider font-bold text-slate-400">
                    Total Data
                </p>

                <h3 class="mt-2 text-3xl font-black text-slate-900">
                    {{ $testimonials->total() }}
                </h3>

            </div>

        </div>

    </div>

    <!-- SUCCESS ALERT -->
    @if(session('success'))

        <div
            class="flex items-center gap-4 p-5 rounded-3xl
            bg-gradient-to-r from-emerald-50 to-green-50
            border border-emerald-100 shadow-sm">

            <div
                class="w-12 h-12 rounded-2xl
                bg-emerald-500 flex items-center justify-center
                shadow-lg shadow-emerald-500/20">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7" />

                </svg>

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

    <!-- TABLE CARD -->
    <div
        class="relative overflow-hidden rounded-[32px]
        border border-white/40
        bg-white/75 backdrop-blur-2xl
        shadow-[0_20px_60px_-15px_rgba(15,23,42,0.12)]">

        <!-- TOP GRADIENT -->
        <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-r from-amber-100/40 via-orange-100/20 to-transparent"></div>

        <!-- HEADER -->
        <div class="relative px-7 py-6 border-b border-slate-100/80">

            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-5">

                <!-- LEFT -->
                <div>

                    <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                        Testimonials List
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        All customer reviews are displayed here.
                    </p>

                </div>

                <!-- SEARCH -->
                <div class="relative w-full xl:w-[350px]">

                    <input
                        type="text"
                        placeholder="Search testimonials..."
                        class="w-full h-13 pl-12 pr-4 rounded-2xl
                        bg-slate-50/80
                        border border-slate-200/80
                        focus:outline-none
                        focus:ring-4 focus:ring-amber-100
                        focus:border-amber-300
                        transition-all duration-300
                        text-sm placeholder:text-slate-400">

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

        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-slate-100 bg-slate-50/50">

                        <th class="px-7 py-5 text-left text-[11px] font-black uppercase tracking-[0.15em] text-slate-400">
                            Customer
                        </th>

                        <th class="px-7 py-5 text-left text-[11px] font-black uppercase tracking-[0.15em] text-slate-400">
                            Review
                        </th>

                        <th class="px-7 py-5 text-left text-[11px] font-black uppercase tracking-[0.15em] text-slate-400">
                            Rating
                        </th>

                        <th class="px-7 py-5 text-left text-[11px] font-black uppercase tracking-[0.15em] text-slate-400">
                            Status
                        </th>

                        <th class="px-7 py-5 text-center text-[11px] font-black uppercase tracking-[0.15em] text-slate-400">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100/80">

                    @forelse($testimonials as $testimonial)

                        <tr class="group hover:bg-gradient-to-r hover:from-amber-50/40 hover:to-orange-50/20 transition-all duration-300">

                            <!-- USER -->
                            <td class="px-7 py-6">

                                <div class="flex items-center gap-4">

                                    <div
                                        class="relative w-14 h-14 rounded-2xl
                                        bg-gradient-to-br from-amber-400 to-orange-500
                                        flex items-center justify-center
                                        text-white font-black text-lg
                                        shadow-lg shadow-orange-500/20">

                                        {{ strtoupper(substr($testimonial->user_name, 0, 1)) }}

                                        <div class="absolute inset-0 rounded-2xl bg-white/10"></div>

                                    </div>

                                    <div>

                                        <h3 class="font-bold text-slate-900">
                                            {{ $testimonial->user_name }}
                                        </h3>

                                        <p class="text-sm text-slate-500 mt-1">
                                            {{ $testimonial->email }}
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- MESSAGE -->
                            <td class="px-7 py-6">

                                <div class="max-w-md">

                                    <p class="text-sm leading-relaxed text-slate-600">
                                        {{ Str::limit($testimonial->message, 100) }}
                                    </p>

                                </div>

                            </td>

                            <!-- RATING -->
                            <td class="px-7 py-6">

                                <div class="flex items-center gap-1.5">

                                    @for($i = 1; $i <= 5; $i++)

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 transition-all duration-300
                                            {{ $i <= $testimonial->rating
                                                ? 'text-amber-400 fill-amber-400'
                                                : 'text-slate-200' }}"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">

                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />

                                        </svg>

                                    @endfor

                                </div>

                            </td>

                            <!-- STATUS -->
                            <td class="px-7 py-6">

                                @if($testimonial->status == 'approved')

                                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100/80 border border-emerald-200">

                                        <div class="w-2 h-2 rounded-full bg-emerald-500"></div>

                                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wide">
                                            Approved
                                        </span>

                                    </div>

                                @elseif($testimonial->status == 'pending')

                                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-100/80 border border-amber-200">

                                        <div class="w-2 h-2 rounded-full bg-amber-500"></div>

                                        <span class="text-xs font-bold text-amber-700 uppercase tracking-wide">
                                            Pending
                                        </span>

                                    </div>

                                @else

                                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100/80 border border-red-200">

                                        <div class="w-2 h-2 rounded-full bg-red-500"></div>

                                        <span class="text-xs font-bold text-red-700 uppercase tracking-wide">
                                            Rejected
                                        </span>

                                    </div>

                                @endif

                            </td>

                            <!-- ACTION -->
                            <td class="px-7 py-6">

                                <div class="flex items-center justify-center gap-2">

                                    @if($testimonial->status == 'pending')

                                        <!-- APPROVE -->
                                        <form method="POST"
                                            action="{{ route('admin.testimonials.approve', $testimonial->id) }}">

                                            @csrf

                                            <button
                                                type="submit"
                                                class="px-4 py-2 rounded-xl
                                                bg-emerald-500 hover:bg-emerald-600
                                                text-white text-xs font-bold
                                                shadow-lg shadow-emerald-500/20
                                                hover:scale-[1.03]
                                                transition-all duration-300">

                                                Approve
                                            </button>

                                        </form>

                                        <!-- REJECT -->
                                        <form method="POST"
                                            action="{{ route('admin.testimonials.reject', $testimonial->id) }}">

                                            @csrf

                                            <button
                                                type="submit"
                                                class="px-4 py-2 rounded-xl
                                                bg-amber-500 hover:bg-amber-600
                                                text-white text-xs font-bold
                                                shadow-lg shadow-amber-500/20
                                                hover:scale-[1.03]
                                                transition-all duration-300">

                                                Reject
                                            </button>

                                        </form>

                                    @endif

                                    <!-- DELETE -->
                                    <form method="POST"
                                        action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                        onsubmit="return confirm('Yakin mau hapus?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-11 h-11 rounded-2xl
                                            bg-red-500 hover:bg-red-600
                                            text-white
                                            flex items-center justify-center
                                            shadow-lg shadow-red-500/20
                                            hover:scale-[1.05]
                                            transition-all duration-300">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />

                                            </svg>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-24 text-center">

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
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-4 4v-4z" />

                                        </svg>

                                    </div>

                                    <h3 class="text-xl font-bold text-slate-700">
                                        No testimonials found
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2">
                                        Testimonials data will appear here later.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- PAGINATION -->
    <div class="pt-1">

        {{ $testimonials->links() }}

    </div>

</div>

@endsection