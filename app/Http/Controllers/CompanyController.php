<?php

namespace App\Http\Controllers;

use App\Models\tblCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = auth()->user();

        if ($user->role === 'superadmin') {
            $companies = tblCompany::orderBy('created_at', 'desc')->get();
        } else {
            $companies = tblCompany::where('id', $user->tbl_company_id)->get();
        }

        return view('admin.company.index', [
            'companies' => $companies,
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

        $user = Auth::user();

        // Cek apakah user sudah memiliki perusahaan
        if ($user->tbl_company_id) {
            return redirect()->route('dashboard.company.index')
                ->with('error', 'Kamu sudah bikin company, jadi kamu tidak bisa bikin lagi');
        }

        $data = $request->validate([
            'company' => 'required|string',
            'cover' => 'required|mimes:png,jpg,jpeg|max:2048|image',
            'about' => 'required|string',
            'website' => 'sometimes|string',
            'email' => 'sometimes|email',
        ]);

        DB::beginTransaction();
        try {

            // Buat atau dapatkan objek perusahaan
            $company = auth()->user()->Company;

            if (!$company) {
                $company = new tblCompany();
            }

            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('company_covers', 'public');
                $company['cover'] = $coverPath;
            }

            // Isi data perusahaan
            $company->company = $data['company'];
            $company->email = $data['email']; // pastikan email diisi dari form atau kosongkan jika tidak ada
            $company->about = $data['about'];
            $company->website = $data['website'];

            // Simpan perusahaan
            $company->save();

            // Hubungkan pengguna dengan perusahaan
            $user = Auth::user();
            $user->tbl_company_id = $company->id;
            $user->save();

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
        $jobs = $company->Job()->orderBy('id', 'DESC')->get();
        return view('admin.company.detail', [
            'company' => $company,
            'jobs' => $jobs,
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
            'about' => 'required|string',
            'website' => 'sometimes|nullable|string',
            'email' => 'sometimes|nullable|email',
        ]);

        try {
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('company_covers', 'public');
                if ($company->cover) {
                    Storage::disk('public')->delete($company->cover);
                }
                $data['cover'] = $coverPath;
            }
            $data['about'] = $request->about;
            $data['website'] = $request->website;
            $data['email'] = $request->email;

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
