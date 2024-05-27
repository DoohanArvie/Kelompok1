<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        return view('admin.user.index', compact('admins', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|lowercase|min:8|max:50',
            'no_hp' => 'required|string',
            'password' => 'required|string',
            'tgl_lahir' => 'required|before:today',
            'address' => 'required|string',
            'foto' => 'sometimes|image|max:2048|mimes:png,jpg,jpeg',
            'role' => 'required|string',
            'gender' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $data['password'] = Hash::make($request->password);
            User::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System_error!!' . $e->getMessage()],
            ]);

            throw $error;
        }

        return redirect()->route('dashboard.user.index')->with('success', 'User created successfully');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('dashboard.user.index')->with('success', 'User deleted successfully');

        //
    }
}
