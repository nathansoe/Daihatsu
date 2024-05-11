<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hello', function () {
    return 'Hello World';
});


Route::post('/register', [RegisterController::class, 'store']);
Route::get('/all', [AdminController::class, 'allKehadiran']);
Route::get('/hadir', [AdminController::class, 'hadir']);
Route::get('/tidakHadir', [AdminController::class, 'tidakHadir']);
Route::post('/verifikasiKehadiran/{qrcodeId}', [AdminController::class, 'verifikasiKehadiran'])->name('verifikasiKehadiran');