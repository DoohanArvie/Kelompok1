<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|lowercase|min:8|max:50',
            'no_hp' => 'required|string',
            'tgl_lahir' => 'required|before:today',
            'address' => 'required|string',
            'foto' => 'sometimes|image|max:2048|mimes:png,jpg,jpeg',
            'role' => 'required|string',
            'gender' => 'required|string',
        ]);


        DB::beginTransaction();
        try {
            if ($request->hasFile('foto')) {
                $filePath = $request->file('foto')->store('cover_avatars', 'public');
                if (Auth::user()->foto) {
                    Storage::disk('public')->delete(Auth::user()->foto);
                }

                $data['foto'] = $filePath;
            }
            User::find(Auth::user()->id)->update($data);
            DB::commit();
            return redirect()->route('dashboard.profile.index')->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
