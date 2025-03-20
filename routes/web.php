<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\GenerationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index');


Route::middleware(['auth', 'verified'])->group(function () {
    // Rutas para gestión de usuarios
    Route::get('/users/manage', [UserController::class, 'manage'])->name('users.manage');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Otras rutas
    Route::get('/consumption/incorporate', [ConsumptionController::class, 'incorporate'])->name('consumption.incorporate');
    Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
    Route::get('/investments', [InvestmentController::class, 'index'])->name('investments.index');
    Route::get('/generation/upload', [GenerationController::class, 'upload'])->name('generation.upload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
