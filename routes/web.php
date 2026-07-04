<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\AuthController;

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
Route::prefix('programAdmin')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])
        ->name('program.index');
    Route::get('/create', [ProgramController::class, 'create'])
        ->name('program.create');
    Route::post('/store', [ProgramController::class, 'store'])
        ->name('program.store');
    Route::get('/edit/{id}', [ProgramController::class, 'edit'])
        ->name('program.edit');
    Route::put('/update/{id}', [ProgramController::class, 'update'])
        ->name('program.update');
    Route::delete('/delete/{id}', [ProgramController::class, 'destroy'])
        ->name('program.destroy');
});

// ======================
// ADMIN TIM
// ======================
Route::prefix('timAdmin')->group(function () {
    Route::get('/', [TimController::class, 'index'])
        ->name('tim.index');
    Route::get('/create', [TimController::class, 'create'])
        ->name('tim.create');
    Route::post('/store', [TimController::class, 'store'])
        ->name('tim.store');
    Route::get('/edit/{id}', [TimController::class, 'edit'])
        ->name('tim.edit');
    Route::put('/update/{id}', [TimController::class, 'update'])
        ->name('tim.update');
    Route::delete('/delete/{id}', [TimController::class, 'destroy'])
        ->name('tim.destroy');
});

// ======================
// AUTH
// ======================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'process'])->name('login.process');

// Halaman daftar / sign up admin
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ======================
// ADMIN (protected)
// ======================
Route::middleware('auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});

Route::get('/pengaturan', function () {
    return view('admin.pengaturan');
})->name('pengaturan');