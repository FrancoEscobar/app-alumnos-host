<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [ProfileController::class, 'edit'])->name('user.dashboard');
    Route::put('/user/dashboard', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', AdminMiddleware::class])
    ->name('admin.dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');