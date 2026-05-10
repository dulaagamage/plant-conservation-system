<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlantController;

Route::get('/', function () {
    return view('plants');
});

Route::get('/plants', function () {
    return view('plants');
});

Route::get('/plants/{id}', function ($id) {
    return view('plant-detail', compact('id'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/plants', [PlantController::class, 'index'])->name('admin.plants');

    Route::get('/plants/create', [PlantController::class, 'create'])->name('admin.plants.create');

    Route::post('/plants', [PlantController::class, 'store'])->name('admin.plants.store');

    Route::get('/plants/{plant}/edit', [PlantController::class, 'edit'])->name('admin.plants.edit');
    
    Route::put('/plants/{plant}', [PlantController::class, 'update'])->name('admin.plants.update');

    Route::delete('/plants/{plant}', [PlantController::class, 'destroy'])->name('admin.plants.destroy');
});

require __DIR__ . '/auth.php';
