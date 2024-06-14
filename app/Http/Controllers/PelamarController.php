<?php

namespace App\Http\Controllers;

use App\Models\tblCv;
use App\Models\tblJob;
use App\Models\tblJobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelamarController extends Controller
{
    public function daftarpelamar($slug)
    {
        $jobs = tblJob::where('slug', $slug)->first();
        if (!$jobs) {

            abort(404, 'Job not found');
        }
        $pelamar = $jobs->seekers()->orderBy('id', 'ASC')->get();

        return view('admin.company.daftarpelamar', [
            'jobs' => $pelamar,
        ]);
    }

    public function updateStatus($id)
    {
        $status = tblJobseeker::find($id);

        if (!$status) {
            return redirect()->back()->with('error', 'Job seeker not found');
        }
        $status->update(['status' => true]);
        // $status->status = 1;
        // $status->save();
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function download_cv($id)
    {
        $cv = tblCv::find($id);
        if (!$cv) {
            return redirect()->back()->with('error', 'CV not found');
        }
        if (!Storage::disk('public')->exists($cv->cv)) {
            return redirect()->back()->with('error', 'CV tidak ada');
        }
        return Storage::disk('public')->download($cv->cv);
        // return response()->download(public_path($cv->cv));
    }


    public function download_document($id)
    {
        $cv = tblCv::find($id);
        if (!$cv) {
            return redirect()->back()->with('error', 'CV not found');
        }
        if (!Storage::disk('public')->exists($cv->document)) {
            return redirect()->back()->with('error', 'CV tidak ada');
        }
        return Storage::disk('public')->download($cv->document);
        // return response()->download(public_path($cv->cv));
    }



}
