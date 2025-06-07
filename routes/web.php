<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobSeekerLoginController;
use App\Http\Controllers\EmployerLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/login/employer', [EmployerLoginController::class, 'showLoginForm'])->name('employer.login');
Route::post('/login/employer', [EmployerLoginController::class, 'login']);
Route::post('/logout/employer', [EmployerLoginController::class, 'logout'])->name('employer.logout');

Route::get('/login/jobseeker', [JobSeekerLoginController::class, 'showLoginForm'])->name('jobseeker.login');
Route::post('/login/jobseeker', [JobSeekerLoginController::class, 'login']);
Route::post('/logout/jobseeker', [JobSeekerLoginController::class, 'logout'])->name('jobseeker.logout');

require __DIR__.'/auth.php';
