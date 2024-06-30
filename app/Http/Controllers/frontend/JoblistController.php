<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\tblJob;
use App\Models\tblCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;

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



    public function applyJob($slug)
    {
        $job = tblJob::where('slug', $slug)->first();
        return view('frontend.apply', [
            'job' => $job,
            'pelamar' => $job->seekers()->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function applyStore(Request $request, string $id)
    {
        $request->validate([
            'email' => 'string|required|email',
        ]);
        $job = tblJob::where('id', $id)->first();

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error = ValidationException::withMessages([
                'system_error' => ['email anda tidak terdaftar'],
            ]);
            throw $error;
        }

        $userExitst = $job->seekers()->where('tbl_user_id', $user->id)->first();
        if ($userExitst) {
            $error = ValidationException::withMessages([
                'system_error' => ['anda sudah mendaftar pekerjaan ini'],
            ]);
            throw $error;
        }

        DB::beginTransaction();
        try {
            $job->seekers()->attach($user->id, ['created_at' => now(), 'updated_at' => now()]);
            DB::commit();

            return redirect()->route('job-detail', $job->slug)->with('toast_success', 'Anda Berhasil Mendaftar Pekejaan Ini');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System Error', $e->getMessage()],
            ]);
            throw $error;
        }
    }

    public function category($slug)
    {

        $total_jobs_category = tblJob::whereHas('category', function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })->where('is_open', '1')->count();
        $all_categories = tblCategory::all();
        $category = tblCategory::where('slug', $slug)->first();
        $job_categories = tblJob::where('tbl_category_id', $category->id)->where('is_open', '1')->paginate(9)->withQueryString();
        return view('frontend.filtercategory', [
            'all_categories' => $all_categories,
            'category' => $category,
            'job_categories' => $job_categories,
            'total_jobs_category' => $total_jobs_category,

        ]);
    }
}
