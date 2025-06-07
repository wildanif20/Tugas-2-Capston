<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job_seekers;
use App\Models\Employers;
use App\Models\Job_postings;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class EmployersDanJobSeekers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employers = Job_postings::all();
        // dd($employers->toArray());
        return view('dashboard', compact('employers'));
    }

    public function index_employers()
    {
        $user = Employers::findById(Auth::user()->email);
        $employers = Job_postings::where('employer_id', $user->id)->get();
        return view('dashboard', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employers = Employers::findById(Auth::user()->email);
        // dd($employers->toArray());
        return view('dashboard', compact('employers'));
        // return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        // dd($request->all());
        // dd(auth()->user());
        $employer = Employers::findById(Auth::user()->email);

        $user = job_postings::create([
            'employer_id' => $employer->id,
            'judul_pekerjaan' => $request->judul_pekerjaan,
            'deskripsi' => $request->deskripsi_pekerjaan,
            'kisaran_gaji' => $request->kisaran_gaji,
            'tanggal_posting' => $request->tanggal_posting,
            'tanggal_hingga' => $request->berlaku_hingga,
        ]);
        echo "<script>alert('Pekerjaan berhasil ditambahkan!'); window.history.back();</script>";
        exit;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function show_employer(string $id)
    {
         // Ambil data employer berdasarkan id
        $employer = \App\Models\Employers::find($id);

        // Jika data tidak ditemukan, bisa redirect atau tampilkan pesan
        if (!$employer) {
            return redirect()->back()->with('error', 'Employer tidak ditemukan.');
        }

        // Kirim data ke view
        return view('show_employer.show', compact('employer'));
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
    // public function update(Request $request, string $id)
    public function update(Request $request)
    {
        dd('Development in progress');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
