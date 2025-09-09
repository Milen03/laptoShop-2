<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\LaptopController;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Laptop routes - ВАЖНО: create трябва да е ПРЕДИ {laptop}
Route::get('/laptops', [LaptopController::class, 'index'])->name('laptops');

// Protected routes (create трябва да е преди show!)
Route::middleware('auth')->group(function () {
    Route::get('/laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
    Route::post('/laptops', [LaptopController::class, 'store'])->name('laptops.store');
    Route::get('/laptops/{laptop}/edit', [LaptopController::class, 'edit'])->name('laptops.edit');
    Route::put('/laptops/{laptop}', [LaptopController::class, 'update'])->name('laptops.update');
    Route::delete('/laptops/{laptop}', [LaptopController::class, 'destroy'])->name('laptops.destroy');
});

// Show route трябва да е СЛЕД create
Route::get('/laptops/{laptop}', [LaptopController::class, 'show'])->name('laptops.show');




// Route::get('/admin', function () {
//     $laptops = \App\Models\Laptop::latest()->get();
//     return view('admin', compact('laptops'));
// })->middleware('auth')->name('admin');

