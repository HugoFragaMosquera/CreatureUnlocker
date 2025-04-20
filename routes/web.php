<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiendaController;


// Página de bienvenida (si aún no hay un usuario)
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');


// Rutas de usuario ////////////////

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Home
Route::get('/home', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

    // Subir nivel de criatura
    Route::post('/criatura/{id}/subir-nivel', [HomeController::class, 'subirNivel'])
        ->middleware(['auth'])
        ->name('criatura.subirNivel');


// Tienda
Route::get('/tienda', function () {
    return view('tienda');
})->middleware(['auth'])->name('tienda');

    // Obtener criatura de un huevo
    Route::post('/tienda/obtener', [TiendaController::class, 'obtenerCriatura'])
        ->middleware(['auth'])
        ->name('tienda.obtener');


require __DIR__.'/auth.php';