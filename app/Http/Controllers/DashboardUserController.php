<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    // sekalian untuk halaman user dashboardnya

    public function index()
    {
        return view('frontend.dashboard.dashboarduser');
    }
}
