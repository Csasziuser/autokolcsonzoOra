<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome',);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/car/index', [CarController::class, 'getCar' ]);
Route::post('/api/car/save', [CarController::class, 'store']);

Route::get('/api/rent/index', [RentController::class, 'getRent' ]);
Route::post('/api/rent/save', [RentController::class, 'store']);

require __DIR__.'/auth.php';
