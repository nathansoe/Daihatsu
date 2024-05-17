<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function(){
    return view('pages/guest/index');
})->name('user.page');

Route::post('/registerUser', [RegisterController::class, 'storeUser']);
Route::post('/cekRegister', [RegisterController::class, 'cekRegister']);
Route::get('/download-qr/{nik}', [RegisterController::class, 'downloadQr'])->name('download');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);


Route::get('/dashboard', function () {
    return view('pages.admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/report', function () {
    return view('pages.admin.report');
})->middleware(['auth', 'verified'])->name('report');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/all/filter/{status}', [AdminController::class, 'filterKehadiran'])->name('filter');
    Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export');
    Route::post('/verifikasiKehadiran/{id}', [AdminController::class, 'verifikasiKehadiran'])->name('verifikasiKehadiran');
    Route::post('/dataKehadiran/{id}', [AdminController::class, 'jsonDataKehadiran'])->name('jsonKehadiran');
    Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
    Route::get('/report/{status}', [AdminController::class, 'filterKehadiran']);
    Route::post('/deleteList', [AdminController::class, 'destroyCheckList'])->name('admin.deleteList');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::post('/register', [RegisterController::class, 'storeUser'])->name('register');