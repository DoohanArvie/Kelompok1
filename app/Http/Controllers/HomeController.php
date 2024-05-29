<?php

namespace App\Http\Controllers;

use App\Models\tblJob;
use App\Models\tblCompany;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = tblJob::latest()->limit(6)->get();

        return view('frontend.home', compact('jobs'));
    }
}
