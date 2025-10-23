<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:100',
            'email'     => 'required|email|max:100',
            'message'   => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'user_name' => $request->user_name,
            'email'     => $request->email,
            'message'   => $request->message,
            'rating'    => $request->rating,
            'status'    => 'pending', // default pending, admin yang approve
        ]);

        return redirect()->route('home')->with('success', 'Testimonial Anda berhasil dikirim! Tunggu persetujuan admin.');
    }
}
