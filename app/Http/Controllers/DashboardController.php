<?php

namespace App\Http\Controllers;

use App\Models\tblCategory;
use App\Models\tblCompany;
use App\Models\tblContact;
use App\Models\tblJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $user = auth()->user();
        $isSuperAdmin = $user->role === 'superadmin';

        // if ($isSuperAdmin) {
        //     $data = [
        //         'total_job' => tblJob::count(),
        //         'total_company' => tblCompany::count(),
        //         'total_category' => tblCategory::count(),
        //         'total_user' => User::where('role', 'user')->count(),
        //         'total_admin' => User::where('role', 'admin')->count(),
        //         'total_contact' => tblContact::count(),
        //     ];
        // } else {
        //     $data = [
        //         'total_job' => tblJob::whereHas('company', function ($query) use ($user) {
        //             $query->where('id', $user->tbl_company_id);
        //         })->count(),
        //         'total_company' => tblCompany::where('id', $user->tbl_company_id)->count(),
        //     ];
        // }

        if ($isSuperAdmin) {
            $data = [
                'total_job' => DB::table('tbl_jobs')->count(),
                'total_company' => DB::table('tbl_companies')->count(),
                'total_category' => DB::table('tbl_categories')->count(),
                'total_user' => DB::table('tbl_users')->where('role', 'user')->count(),
                'total_admin' => DB::table('tbl_users')->where('role', 'admin')->count(),
                'total_contact' => DB::table('tbl_contacts')->count(),
            ];
        } else {
            $data = [
                'total_job' => DB::table('tbl_jobs')
                    ->join('tbl_companies', 'tbl_jobs.tbl_company_id', '=', 'tbl_companies.id')
                    ->where('tbl_companies.id', $user->tbl_company_id)
                    ->count(),
                'total_company' => DB::table('tbl_companies')
                    ->where('id', $user->tbl_company_id)
                    ->count(),
            ];
        }

        return view('admin.dashboard', $data);
    }



}
