<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\LaptopController;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/laptops', [LaptopController::class, 'index'])->name('laptops');

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

// Route::get('/admin', function () {
//     $laptops = \App\Models\Laptop::latest()->get();
//     return view('admin', compact('laptops'));
// })->middleware('auth')->name('admin');

