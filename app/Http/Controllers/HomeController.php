<?php

namespace App\Http\Controllers;

use App\Models\tblCategory;
use App\Models\tblCompany;
use App\Models\tblContact;
use App\Models\tblJob;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = tblJob::where('is_open', '1')->latest()->limit(6)->get();
        $categories = tblCategory::orderBy('id', 'DESC')->get();
        return view('frontend.home', [
            'categories' => $categories,
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
}
