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
        // return view('frontend.job_listing', [
        //     'total_jobs' => tblJob::count(),
        //     'jobs' => tblJob::where('is_open', '1')->paginate(6)->withQueryString(),
        //     'categories' => tblCategory::all()

        // ]);

        $jobs = DB::table('tbl_jobs')
            ->join('tbl_companies', 'tbl_jobs.tbl_company_id', '=', 'tbl_companies.id')
            ->select('tbl_jobs.*', 'tbl_companies.company', 'tbl_companies.cover')
            ->where('tbl_jobs.is_open', '1')
            ->paginate(2);

        return view('frontend.job_listing', [
            'total_jobs' => DB::table('tbl_jobs')->count(),
            'jobs' => $jobs,
            'categories' => DB::table('tbl_categories')->get(),
        ]);
    }

    public function show($slug)
    {
        // $job = tblJob::where('slug', $slug)->first();
        $job = DB::table('tbl_jobs')
            ->join('tbl_companies', 'tbl_jobs.tbl_company_id', '=', 'tbl_companies.id')
            ->select('tbl_jobs.*', 'tbl_companies.company', 'tbl_companies.cover', 'tbl_companies.about', 'tbl_companies.website', 'tbl_companies.email')
            ->where('tbl_jobs.slug', $slug)
            ->first();
        return view('frontend.job_detail', compact('job'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        // $jobs = tblJob::where('job', 'like', '%' . $keyword . '%')
        //     ->orWhereHas('category', function ($query) use ($keyword) {
        //         $query->where('name', 'like', '%' . $keyword . '%');
        //     })->paginate(1)->withQueryString();
        // return view('frontend.search', [
        //     'jobs' => $jobs,
        //     'keyword' => $keyword,
        // ]);

        $jobs = DB::table('tbl_jobs')
            ->join('tbl_companies', 'tbl_jobs.tbl_company_id', '=', 'tbl_companies.id')
            ->select('tbl_jobs.*', 'tbl_companies.company', 'tbl_companies.cover')
            ->where('tbl_jobs.is_open', '1')
            ->where(function ($query) use ($keyword) {
                $query->where('tbl_jobs.job', 'like', '%' . $keyword . '%')
                    ->orWhereExists(function ($subquery) use ($keyword) {
                        $subquery->select(DB::raw(1))
                            ->from('tbl_categories')
                            ->whereColumn('tbl_jobs.tbl_category_id', 'tbl_categories.id')
                            ->where('tbl_categories.name', 'like', '%' . $keyword . '%');
                    });
            })
            ->paginate(6);

        return view('frontend.search', compact('jobs', 'keyword'));
    }



    public function applyJob($slug)
    {
        // $job = tblJob::where('slug', $slug)->first();
        // return view('frontend.apply', [
        //     'job' => $job,
        //     'pelamar' => $job->seekers()->orderBy('id', 'DESC')->get(),
        // ]);

        $job = DB::table('tbl_jobs')
            ->join('tbl_companies', 'tbl_jobs.tbl_company_id', '=', 'tbl_companies.id')
            ->join('tbl_categories', 'tbl_jobs.tbl_category_id', '=', 'tbl_categories.id')
            ->select('tbl_jobs.*', 'tbl_companies.company', 'tbl_companies.cover', 'tbl_categories.name as category_name')
            ->where('tbl_jobs.slug', $slug)
            ->first();

        return view('frontend.apply', [
            'job' => $job,
            'pelamar' => DB::table('tbl_jobseekers')
                ->join('tbl_users', 'tbl_jobseekers.tbl_user_id', '=', 'tbl_users.id')
                ->where('tbl_jobseekers.tbl_job_id', $job->id)
                ->orderBy('tbl_jobseekers.id', 'DESC')
                ->get(),
        ]);
    }

    public function applyStore(Request $request, string $id)
    {
        $request->validate([
            'email' => 'string|required|email',
        ]);
        // $job = tblJob::where('id', $id)->first();
        // $currentUser = auth()->user();

        // // Periksa apakah email yang dimasukkan sesuai dengan email user yang sedang login
        // if ($request->email !== $currentUser->email) {
        //     throw ValidationException::withMessages([
        //         'email' => ['Anda hanya dapat mendaftar menggunakan email Anda sendiri.'],
        //     ]);
        // }

        // $user = User::where('email', $request->email)->first();
        // if (!$user) {
        //     $error = ValidationException::withMessages([
        //         'system_error' => ['email anda tidak terdaftar'],
        //     ]);
        //     throw $error;
        // }

        // $userExitst = $job->seekers()->where('tbl_user_id', $user->id)->first();
        // if ($userExitst) {
        //     $error = ValidationException::withMessages([
        //         'system_error' => ['anda sudah mendaftar pekerjaan ini'],
        //     ]);
        //     throw $error;
        // }

        // DB::beginTransaction();
        // try {
        //     $job->seekers()->attach($user->id, ['created_at' => now(), 'updated_at' => now()]);
        //     DB::commit();

        //     return redirect()->route('job-detail', $job->slug)->with('toast_success', 'Anda Berhasil Mendaftar Pekejaan Ini');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     $error = ValidationException::withMessages([
        //         'system_error' => ['System Error', $e->getMessage()],
        //     ]);
        //     throw $error;
        // }

        $job = DB::table('tbl_jobs')->where('id', $id)->first();

        $currentUser = auth()->user();

        if ($request->email !== $currentUser->email) {
            throw ValidationException::withMessages([
                'email' => ['Anda hanya dapat mendaftar menggunakan email Anda sendiri.'],
            ]);
        }

        $user = DB::table('tbl_users')->where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'system_error' => ['Email tidak terdaftar.'],
            ]);
        }

        $userExists = DB::table('tbl_jobseekers')
            ->where('tbl_job_id', $job->id)
            ->where('tbl_user_id', $user->id)
            ->exists();

        if ($userExists) {
            throw ValidationException::withMessages([
                'system_error' => ['Anda sudah mendaftar untuk pekerjaan ini.'],
            ]);
        }

        DB::beginTransaction();

        try {
            DB::table('tbl_jobseekers')->insert([
                'tbl_job_id' => $job->id,
                'tbl_user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('job-detail', $job->slug)->with('toast_success', 'Pendaftaran berhasil.');
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'system_error' => ['Terjadi kesalahan sistem.'],
            ]);
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
