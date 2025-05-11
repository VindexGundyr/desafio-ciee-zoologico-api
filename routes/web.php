<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\API\AnimalController;
use App\Http\Controllers\API\CuidadoController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::apiResource('animais', AnimalController::class)->parameters([
    'animais' => 'animal'
]);

Route::apiResource('cuidados', CuidadoController::class)->parameters([
    'cuidados' => 'cuidado' 
]);