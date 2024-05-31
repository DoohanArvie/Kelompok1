<?php

namespace App\Http\Controllers\frontend;

use App\Models\tblJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tblCategory;

class JoblistController extends Controller
{
    public function index()
    {
        return view('frontend.job_listing', [
            'total_jobs' => tblJob::count(),
            'jobs' => tblJob::latest()->get(),
            'categories' => tblCategory::all()

        ]);
    }

    public function show($slug)
    {
        $job = tblJob::where('slug', $slug)->first();
        return view('frontend.job_detail', compact('job'));
    }
}
