<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboarduser';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tbl_users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_hp' => ['required'],
            'address' => ['required', 'string', "max:255"],
            'tgl_lahir' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'no_hp' => $data['no_hp'],
            'address' => $data['address'],
            'role' => 'user',
            'tgl_lahir' => $data['tgl_lahir'],
            'gender' => $data['gender'],
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => ['required', 'string', 'email', 'max:255', new UniqueEmailRule],
    //         'no_hp' => 'required|string|max:15',
    //         'tgl_lahir' => 'required|date|before:today',
    //         'address' => 'required|string|max:255',
    //         'gender' => 'required|string',
    //         'password' => ['required', 'string', 'min:8', 'confirmed']
    //     ]);

    //     $user = User::create([
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email'],
    //         'password' => Hash::make($validatedData['password']),
    //         'no_hp' => $validatedData['no_hp'],
    //         'address' => $validatedData['address'],
    //         'role' => 'user',
    //         'tgl_lahir' => $validatedData['tgl_lahir'],
    //         'gender' => $validatedData['gender'],
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect('/email/verify');


    // }
}
