<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index()
    {
        // Add your logic here
        return view('user.PaketWisata');
    }
}
