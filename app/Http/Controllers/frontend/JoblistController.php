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
            'jobs' => tblJob::where('is_open', '1')->paginate(6)->withQueryString(),
            'categories' => tblCategory::all()

        ]);
    }

    public function show($slug)
    {
        $job = tblJob::where('slug', $slug)->first();
        return view('frontend.job_detail', compact('job'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $jobs = tblJob::where('job', 'like', '%' . $keyword . '%')
            ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })->paginate(1)->withQueryString();
        return view('frontend.search', [
            'jobs' => $jobs,
            'keyword' => $keyword,
        ]);
    }
}
