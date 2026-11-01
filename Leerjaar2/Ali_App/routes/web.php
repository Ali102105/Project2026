<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeverancierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// BE-opdracht 1: Magazijn
Route::get('/Magazijn', [MagazijnController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('magazijn.index');

Route::get(
    '/Magazijn/Allergenen/{productId}',
    [MagazijnController::class, 'allergenen']
)
    ->name('magazijn.allergenen');

Route::get(
    '/Magazijn/Leverantie/{productId}',
    [MagazijnController::class, 'leverantie']
)
    ->name('magazijn.leverantie');

// BE-opdracht 2: Leveranciers
Route::middleware([
    'auth',
    'verified',
    'role:Admin,Magazijnmedewerker'
])->group(function () {

    Route::get(
        '/leveranciers',
        [LeverancierController::class, 'index']
    )
        ->name('leveranciers.index');

    Route::get(
        '/leveranciers/{leverancierId}/producten',
        [LeverancierController::class, 'producten']
    )
        ->whereNumber('leverancierId')
        ->name('leveranciers.producten');


    Route::get(
        '/leveranciers/{leverancierId}/producten/{productId}/levering',
        [LeverancierController::class, 'leveringFormulier']
    )
        ->whereNumber('leverancierId')
        ->whereNumber('productId')
        ->name('leveranciers.levering.form');

    Route::post(
        '/leveranciers/{leverancierId}/producten/{productId}/levering',
        [LeverancierController::class, 'leveringOpslaan']
    )
        ->whereNumber('leverancierId')
        ->whereNumber('productId')
        ->name('leveranciers.levering.opslaan');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profiel
Route::middleware('auth')->group(function () {
    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )
        ->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )
        ->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
