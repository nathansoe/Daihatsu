<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hello', function () {
    return 'Hello World';
});


Route::post('/register', [RegisterController::class, 'store']);
Route::get('/cekRegister', [RegisterController::class, 'cekRegister']);
Route::get('/all/filter/{status}', [AdminController::class, 'filterKehadiran'])->name('filter');
Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export');
Route::post('/verifikasiKehadiran/{id}', [AdminController::class, 'verifikasiKehadiran'])->name('verifikasiKehadiran');
Route::post('/dataKehadiran/{id}', [AdminController::class, 'jsonDataKehadiran'])->name('jsonKehadiran');