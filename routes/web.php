<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CombateController;

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

//  Ventas
    // Página de ventas de criaturas
    Route::get('/ventas', [HomeController::class, 'ventas'])
        ->middleware(['auth'])
        ->name('ventas');

    // Vender criatura
    Route::post('/criatura/{id}/vender', [HomeController::class, 'vender'])
        ->middleware(['auth'])
        ->name('criatura.vender');

// Combate
    Route::get('/combate', [CombateController::class, 'index'])
        ->middleware(['auth'])
     ->name('combate');
     
    // Combatir
     Route::post('/combatir', [App\Http\Controllers\CombateController::class, 'combatir'])->name('combatir');

require __DIR__.'/auth.php';