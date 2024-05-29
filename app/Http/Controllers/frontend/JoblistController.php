<?php

namespace App\Http\Controllers\frontend;

use App\Models\tblJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoblistController extends Controller
{
    public function index()
    {


        return view('frontend.job_listing', [
            'total_jobs' => tblJob::count(),
            'jobs' => tblJob::latest()->get(),

        ]);
    }
}
