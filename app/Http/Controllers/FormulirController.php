<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulirController extends Controller
{
    /**
     * Tampilkan halaman formulir booking
     */
    public function create()
    {
        // ini akan memanggil file: resources/views/user/Formulir.blade.php
        return view('user.Formulir');
    }
}
