<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\tblCv;
use App\Models\tblJob;
use App\Mail\EmailPelamar;
use App\Mail\ApplicantEmail;
use App\Models\tblJobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    public function daftarpelamar($slug)
    {
        // $jobs = tblJob::where('slug', $slug)->first();
        $jobs = DB::table("tbl_jobs")->where("slug", $slug)->first();
        if (!$jobs) {

            abort(404, 'Job not found');
        }
        // $pelamar = $jobs->seekers()->orderBy('id', 'ASC')->get();
        $pelamar = DB::table('tbl_jobseekers')
            ->join('tbl_users', 'tbl_jobseekers.tbl_user_id', '=', 'tbl_users.id')
            ->leftJoin('tbl_cvs', 'tbl_users.id', '=', 'tbl_cvs.tbl_user_id')
            ->where('tbl_jobseekers.tbl_job_id', $jobs->id)
            ->select('tbl_jobseekers.*', 'tbl_users.name', 'tbl_users.email', 'tbl_cvs.id as cv_id')
            ->orderBy('tbl_jobseekers.id', 'ASC')
            ->get();

        return view('admin.company.daftarpelamar', [
            'jobs' => $pelamar,
        ]);
    }

    public function updateStatus($id)
    {
        // $status = tblJobseeker::find($id);
        $status = DB::table('tbl_jobseekers')
            ->where('id', $id)
            ->update(['status' => true]);

        if (!$status) {
            return redirect()->back()->with('error', 'Job seeker not found');
        }
        // $status->update(['status' => true]);
        // $status->status = 1;
        // $status->save();
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function download_cv($id)
    {
        // $cv = tblCv::find($id);
        $cv = DB::table('tbl_cvs')->where('id', $id)->first();
        if (!$cv) {
            return redirect()->back()->with('error', 'CV not found');
        }
        if (!Storage::disk('public')->exists($cv->cv)) {
            return redirect()->back()->with('error', 'CV tidak ada');
        }
        return Storage::disk('public')->download($cv->cv);
        // return response()->download(public_path($cv->cv));
    }

    public function pratinjau_cv($id)
    {
        $cv = DB::table('tbl_cvs')->where('id', $id)->first();
        if (!$cv) {
            return redirect()->back()->with('error', 'CV tidak ditemukan');
        }
        if (!Storage::disk('public')->exists($cv->cv)) {
            return redirect()->back()->with('error', 'File CV tidak ada');
        }

        $path = Storage::disk('public')->path($cv->cv);
        $konten = file_get_contents($path);
        $tipe = mime_content_type($path);

        return response($konten)->header('Content-Type', $tipe);
    }


    public function download_document($id)
    {
        // $cv = tblCv::find($id);
        $cv = DB::table('tbl_cvs')->where('id', $id)->first();
        if (!$cv) {
            return redirect()->back()->with('error', 'CV not found');
        }
        if (!Storage::disk('public')->exists($cv->document)) {
            return redirect()->back()->with('error', 'CV tidak ada');
        }
        return Storage::disk('public')->download($cv->document);
        // return response()->download(public_path($cv->cv));
    }


    public function sendEmail(Request $request, $id)
    {
        // $jobseeker = tblJobseeker::findOrFail($id);
        // $user = User::where('id', $jobseeker->tbl_user_id)->first();
        $jobseeker = DB::table('tbl_jobseekers')->where('id', $id)->first();
        $user = DB::table('tbl_users')->where('id', $jobseeker->tbl_user_id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        // $job = tblJob::findOrFail($jobseeker->tbl_job_id);
        $job = DB::table('tbl_jobs')->where('id', $jobseeker->tbl_job_id)->first();

        $subject = $request->input('subject');
        $pesanEmail = $request->input('message');

        Mail::to($user->email)->send(new EmailPelamar($subject, $pesanEmail));

        return redirect()->route('dashboard.daftarpelamar', $job->slug)->with('success', 'Email berhasil dikirim');
    }



}
