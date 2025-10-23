<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class HomeController extends Controller
{
    public function view()
    {
        // Ambil testimonial yang sudah disetujui
        $testimonials = Testimonial::where('status', 'approved')
                                   ->latest()
                                   ->take(8)
                                   ->get();

        return view('user.home', compact('testimonials'));
    }
}
