<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammeController;

Route::get('/', function () {
    return view('dashboard');
});

// Show forms
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::get('/signup', [UserController::class, 'registrationForm'])->name('register');
Route::post('/login', [UserController::class, 'login']);
Route::post('/signup', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/activities', [UserController::class, 'activities'])->name('activities');
Route::get('/staff', [UserController::class, 'staff'])->name('staff');
Route::get('/programmes', [ProgrammeController::class, 'index'])->name('programmes');