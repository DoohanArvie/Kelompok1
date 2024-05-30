<?php

namespace App\Http\Controllers;

use App\Models\tblJob;
use App\Models\tblCompany;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = tblJob::latest()->limit(6)->get();

        return view('frontend.home', compact('jobs'));
    }
}
