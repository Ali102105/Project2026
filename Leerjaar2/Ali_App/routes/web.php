<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/Magazijn', [MagazijnController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('magazijn.index');


Route::get('/Magazijn/Allergenen/{productId}', 
    [MagazijnController::class, 'allergenen'])
    ->name('magazijn.allergenen');

Route::get('/Magazijn/Leverantie/{productId}', 
    [MagazijnController::class, 'leverantie'])
    ->name('magazijn.leverantie');    
    

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
