<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\CategoriaController;



//Ruta al recurso del controlador que hemos creado llamado Ejercicios
Route::resource('ejercicios', EjercicioController::class)->middleware(['auth']);

//Ruta al recurso del controlador que hemos creado llamado Categorias
Route::resource('categorias', CategoriaController::class)->middleware(['auth']);

//Ruta página bienvenida
Route::get('/', function () {
    return view('grindWelcome');
});

//RUta a la dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//RUta para la configuración del perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
