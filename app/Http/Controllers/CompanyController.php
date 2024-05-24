<?php

namespace App\Http\Controllers;

use App\Models\tblCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        return view('admin.company.index', [
            'companies' => tblCompany::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company' => 'required|string',
            'cover' => 'required|mimes:png,jpg,jpeg|max:2048|image',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('company_covers', 'public');
                $data['cover'] = $coverPath;
            }

            tblCompany::create($data);
            DB::commit();

            return redirect()->route('dashboard.company.index')->with('success', 'Company created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()],
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = tblCompany::findOrFail($id);
        return view('admin.company.detail', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.company.edit', [
            'company' => tblCompany::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = tblCompany::findOrFail($id);
        $data = $request->validate([
            'company' => 'required|string',
            'cover' => 'sometimes|mimes:png,jpg,jpeg|max:2048|image',
        ]);

        try {
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('company_covers', 'public');
                if ($company->cover) {
                    Storage::disk('public')->delete($company->cover);
                }
                $data['cover'] = $coverPath;
            }
            tblCompany::findOrFail($id)->update($data);
            DB::commit();
            return redirect()->route('dashboard.company.index')->with('success', 'Company updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
    public function destroy(string $id)
    {
        try {
            $company = tblCompany::findOrFail($id);
            if ($company->cover) {
                Storage::disk('public')->delete($company->cover);
            }
            $company->delete();
            return redirect()->route('dashboard.company.index')->with('success', 'Company deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
