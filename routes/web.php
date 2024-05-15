<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function(){
    return view('pages/guest/index');
});

Route::post('/register', [RegisterController::class, 'store']);
Route::get('/cekRegister', [RegisterController::class, 'cekRegister']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/all/filter/{status}', [AdminController::class, 'filterKehadiran'])->name('filter');
    Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export');
    Route::post('/verifikasiKehadiran/{id}', [AdminController::class, 'verifikasiKehadiran'])->name('verifikasiKehadiran');
    Route::post('/dataKehadiran/{id}', [AdminController::class, 'jsonDataKehadiran'])->name('jsonKehadiran');


});

Route::post('/register', [RegisterController::class, 'store'])->name('register');

// require __DIR__.'/auth.php';
