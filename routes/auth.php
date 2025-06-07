<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployersDanJobSeekers;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin', [AuthenticatedSessionController::class, 'create'])
                ->name('admin');

    Route::post('admin', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
                
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


    Route::post('register-job', [EmployersDanJobSeekers::class, 'store'])->name('register-job');

    // Route::get('register-job', [RegisteredUserController::class, 'create'])
    //             ->name('register-job');


    // buat route untuk menampilkan data employer#
    Route::get('/dashboard/{id}', [EmployersDanJobSeekers::class, 'show_employer'])->name('show_employer.show');

    Route::get('/list_seekers', [EmployersDanJobSeekers::class, 'index'])->name('list_seekers.index');
    Route::get('/list_employers', [EmployersDanJobSeekers::class, 'index_employers'])->name('list_employers.index');

    Route::get('/dashboard', [EmployersDanJobSeekers::class, 'index'])->name('dashboard');

    Route::get('/dashboard_index_employers', [EmployersDanJobSeekers::class, 'index_employers'])->name('dashboard_index_employers');   
    
    Route::get('/list_seekers/update', [EmployersDanJobSeekers::class, 'update'])->name('list_seekers.update');
    
});
