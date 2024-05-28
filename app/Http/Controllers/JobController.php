<?php

namespace App\Http\Controllers;

use App\Models\tblJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = tblJob::with(['company', 'category'])->get();
        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'job' => 'required|string',
            'lokasi' => 'required|string',
            'tbl_category_id' => 'required',
            'tbl_company_id' => 'required',
            'is_open' => 'required|boolean',
            'description' => 'required|string',
            'requirement' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $data['slug'] = Str::slug($data['job']);
            tblJob::create($data);
            DB::commit();

            return redirect()->route("dashboard.job.index")->with('success', 'Job created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()]
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = tblJob::with(['company', 'category'])->findOrFail($id);
        return view('admin.job.detail', compact("job"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.job.edit', ['job' => tblJob::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'job' => 'required|string',
            'lokasi' => 'required|string',
            'tbl_category_id' => 'required',
            'tbl_company_id' => 'required',
            'is_open' => 'required|boolean',
            'description' => 'required|string',
            'requirement' => 'required|string'
        ]);

        try {
            $data['slug'] = Str::slug($data['job']);
            tblJob::findOrFail($id)->update($data);
            DB::commit();

            return redirect()->route("dashboard.job.index")->with('success', 'Job created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()]
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $job = tblJob::findOrFail($id);
            $job->delete();
            DB::commit();

            return redirect()->route('dashboard.job.index')->with('success', 'Job deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error: ' . $e->getMessage()]
            ]);
            throw $error;
        }
    }
}
