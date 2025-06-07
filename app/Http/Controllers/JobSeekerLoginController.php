<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class JobSeekerLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('job_seekers.jobseeker-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('job_seekers')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/jobseeker/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('job_seekers')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login/jobseeker');
    }
}