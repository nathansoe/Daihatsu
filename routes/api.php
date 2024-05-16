<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hello', function () {
    return 'Hello World';
})->name('user.page');


Route::get('/download-qr/{nik}', [RegisterController::class, 'downloadQr'])->name('download');
Route::post('/register', [RegisterController::class, 'storeUser']);
// Route::get('/cekRegister', [RegisterController::class, 'cekRegister']);
// Route::get('/all/filter/{status}', [AdminController::class, 'filterKehadiran'])->name('filter');
// Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export');
Route::post('/verifikasiKehadiran/{id}', [AdminController::class, 'verifikasiKehadiran'])->name('verifikasiKehadiran');
// Route::post('/dataKehadiran/{id}', [AdminController::class, 'jsonDataKehadiran'])->name('jsonKehadiran');
Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
