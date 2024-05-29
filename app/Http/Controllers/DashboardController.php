<?php

namespace App\Http\Controllers;

use App\Models\tblCategory;
use App\Models\tblCompany;
use App\Models\tblContact;
use App\Models\tblJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {

        return view('admin.dashboard', [
            'total_job' => tblJob::count(),
            'total_company' => tblCompany::count(),
            'total_category' => tblCategory::count(),
            'total_user' => User::where('role', 'user')->count(),
            'total_admin' => User::where('role', 'admin')->count(),
            'total_contact' => tblContact::count(),
        ]);
    }



}
