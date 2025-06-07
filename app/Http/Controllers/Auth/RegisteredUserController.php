<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job_seekers;
use App\Models\Employers;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->user_type == 'job_seeker'){
            $user = Job_seekers::create([
                'nama_lengkap' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nomor_telepon' => $request->no_telepon,
                'no_ktp' => $request->no_ktp,
            ]);
            $user_auth = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->user_type,
            ]);
        } elseif ($request->user_type == 'employer') {
            $user = employers::create([
                'nama_lengkap' => $request->name,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'nomor_telepon' => $request->no_telepon,
                'no_ktp' => $request->no_ktp,                
            ]);
            $user_auth = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->user_type,
            ]);
        } else {
            $user_auth = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        event(new Registered($user_auth));

        Auth::login($user_auth);;

        return redirect(RouteServiceProvider::HOME);
    }
}
