<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\tblCategory;
use App\Models\tblCompany;
use App\Models\tblCv;
use App\Models\tblJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DashboardUserController extends Controller
{
    // sekalian untuk halaman user dashboardnya

    public function index()
    {

        $user = Auth::user();
        // $my_jobs = $user->Jobs()->with(['category', 'company'])->orderBy('id', 'DESC')->get();
        $cv = tblCv::where('tbl_user_id', $user->id)->first();
        // $companies = tblCompany::latest()->limit(6)->get();
        // $categories = tblCategory::orderBy('id', 'DESC')->get();
        // $jobs = $user->Jobs()->latest()->limit(6)->get();
        return view('frontend.dashboard.dashboarduser', [
            'cv' => $cv,
            'user' => $user,
            // 'my_jobs' => $my_jobs,
        ]);
    }

    public function edit(string $id)
    {
        return view('frontend.dashboard.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|lowercase|min:8|max:50',
            'no_hp' => 'required|string',
            'address' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|string',
            'tgl_lahir' => 'required|before:today|string',
        ]);

        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);

            if ($request->hasFile('foto')) {
                $filePath = $request->file('foto')->store('cover_avatars', 'public');
                if ($filePath) {
                    if ($user->foto) {
                        Storage::disk('public')->delete($user->foto);
                    }
                    $data['foto'] = $filePath;
                } else {
                    throw ValidationException::withMessages([
                        'foto' => ['Terjadi kesalahan saat meng-upload file. Silakan coba lagi.'],
                    ]);
                }
            }

            $user->update($data);
            DB::commit();

            return redirect()->route('dashboarduser', $user->id)->with('success', 'Profil berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboarduser', $user->id)->withErrors('Terjadi kesalahan saat memperbarui profil: ' . $e->getMessage());
        }
    }

    public function uploadCv(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            'document' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = Auth::user();

        $cvPath = $request->file('cv')->store('cvs', 'public');
        $documentPath = $request->file('document')->store('documents', 'public');

        tblCv::create([
            'cv' => $cvPath,
            'document' => $documentPath,
            'tbl_user_id' => $user->id,
        ]);

        return redirect()->route('dashboarduser')->with('success', 'CV dan dokumen berhasil diunggah');
    }

    public function updateCv(Request $request, string $id)
    {
        $request->validate([
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'document' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $cv = tblCv::findOrFail($id);

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
            if ($cv->cv) {
                Storage::disk('public')->delete($cv->cv);
            }
            $cv->cv = $cvPath;
        }

        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
            if ($cv->document) {
                Storage::disk('public')->delete($cv->document);
            }
            $cv->document = $documentPath;
        }

        $cv->save();

        return redirect()->route('dashboarduser')->with('success', 'CV dan dokumen berhasil diperbarui');
    }
    public function editCv(string $id)
    {
        return view('frontend.dashboard.dashboarduser', [
            'cv' => tblCv::findOrFail($id),
        ]);
    }
}
