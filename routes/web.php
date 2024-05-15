<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RegisterController;

Route::get('/', function(){
    return view('pages/guest/index');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');


Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/register', [RegisterController::class, 'store'])->name('register');

// require __DIR__.'/auth.php';
