<?php

namespace App\Http\Controllers;

use App\Models\tblJob;
use App\Models\tblJobseeker;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function daftarpelamar($slug)
    {
        $jobs = tblJob::where('slug', $slug)->first();
        if (!$jobs) {

            abort(404, 'Job not found');
        }
        $pelamar = $jobs->seekers()->orderBy('id', 'ASC')->get();

        // $status = tblJobseeker::where('tbl_user_id', $pelamar->id)->where('tbl_job_id', $jobs->id)->get();
        return view('admin.company.daftarpelamar', [
            'jobs' => $pelamar,
        ]);
    }

}
