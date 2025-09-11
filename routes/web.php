<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\staffController;

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
Route::post('/programmes', [ProgrammeController::class, 'store'])->name('programmes.store');
Route::get('/programmes/{programme}/edit', [ProgrammeController::class, 'edit'])->name('programmes.edit');
Route::put('/programmes/{programme}', [ProgrammeController::class, 'update'])->name('programmes.update');
Route::delete('/programmes/{programme}', [ProgrammeController::class, 'delete'])->name('programmes.delete');

Route::get('/staff', [staffController::class, 'index'])->name('staffmem');
Route::post('/staff', [staffController::class, 'store'])->name('staff.store');
Route::get('/staff/{staffmem}/edit', [staffController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{staffmem}', [staffController::class, 'update'])->name('staff.update');
Route::delete('/staff/{staffmem}', [staffController::class, 'delete'])->name('staff.delete');


Route::get('/activities', [ActivityController::class, 'index'])->name('activities');
Route::post('/activities/store', [ActivityController::class, 'store'])->name('activities.store');
Route::delete('/activities/delete/{id}', [ActivityController::class, 'delete'])->name('activities.delete');
Route::get('/activities/edit/{id}', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/update/{id}', [ActivityController::class, 'update'])->name('activities.update');