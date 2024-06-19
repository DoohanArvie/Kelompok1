<?php

namespace App\Http\Controllers;

use App\Models\tblCategory;
use App\Models\tblCompany;
use App\Models\tblContact;
use App\Models\tblJob;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $jobs = tblJob::where('is_open', '1')->latest()->limit(4)->get();
        $categories = tblCategory::orderBy('id', 'DESC')->get();
        return view('frontend.home', [
            'categories' => tblCategory::withCount([
                'Jobs' => function (Builder $query) {
                    $query->where('is_open', 1);
                }
            ])->latest()->get(),
            'jobs' => $jobs,
        ]);
    }

    public function footer()
    {
        $total_jobs = tblJob::count();
        $total_companies = tblCompany::count();
        $total_users = User::count();
        return view('frontend.partials.footer', compact('total_jobs', 'total_companies', 'total_users'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'pesan' => 'required|string|max:200',
        ]);

        tblContact::create($data);

        return redirect()->route('contact')->with('success', 'Message sent successfully');
    }

    public function category($slug)
    {
        $categories = tblCategory::where('slug', $slug)->first();
        $job_categories = tblJob::where('tbl_category_id', $categories->id)->where('is_open', 1)->paginate(8);
        return view('frontend.category', [
            'category' => $categories,
            'job_categories' => $job_categories
        ]);
    }
}
