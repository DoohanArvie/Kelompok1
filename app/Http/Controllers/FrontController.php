<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('frontend.coba');
    }

    public function index_dua()
    {
        return view('frontend.coba2');
    }
}
