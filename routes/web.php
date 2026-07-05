<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;

// ======================
// USER
// ======================
Route::get('/', [ProgramController::class, 'home']);
Route::get('/aboutUs', [TimController::class, 'userTim']);
Route::get('/program', [ProgramController::class, 'userProgram']);
Route::get('/contact', function () {
    return view('user.contact');
});

// ======================
// ADMIN PROGRAM
// ======================
Route::middleware('auth')->prefix('programAdmin')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/store', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/edit/{id}', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/update/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/delete/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
});

// ======================
// ADMIN TIM
// ======================
Route::middleware('auth')->prefix('timAdmin')->group(function () {
    Route::get('/', [TimController::class, 'index'])->name('tim.index');
    Route::get('/create', [TimController::class, 'create'])->name('tim.create');
    Route::post('/store', [TimController::class, 'store'])->name('tim.store');
    Route::get('/edit/{id}', [TimController::class, 'edit'])->name('tim.edit');
    Route::put('/update/{id}', [TimController::class, 'update'])->name('tim.update');
    Route::delete('/delete/{id}', [TimController::class, 'destroy'])->name('tim.destroy');
});

// ======================
// PENDAFTARAN (PUBLIK)
// ======================
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

// ======================
// PENDAFTARAN (ADMIN)
// ======================
Route::middleware('auth')->prefix('pendaftaranAdmin')->group(function () {
    Route::get('/', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('/create', [PendaftaranController::class, 'adminCreate'])->name('pendaftaran.adminCreate');
    Route::post('/', [PendaftaranController::class, 'adminStore'])->name('pendaftaran.adminStore');
    Route::get('/{id}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
});

// ======================
// AUTH
// ======================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ======================
// ADMIN DASHBOARD & PENGATURAN (protected)
// ======================
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::get('/pengaturan', function () {
        return view('admin.pengaturan');
    })->name('pengaturan');
});