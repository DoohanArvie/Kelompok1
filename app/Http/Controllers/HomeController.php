<?php

namespace App\Http\Controllers;

use App\Models\tblCategory;
use App\Models\tblJob;
use App\Models\tblCompany;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = tblJob::latest()->limit(6)->get();
        $categories = tblCategory::orderBy('id', 'DESC')->get();
        return view('frontend.home', [
            'categories' => $categories,
            'jobs' => $jobs,
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
