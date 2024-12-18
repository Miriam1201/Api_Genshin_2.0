<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\WeaponController;
use App\Http\Controllers\API\ArtifactController;
use App\Http\Controllers\API\TeamController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api/weapons')->group(function () {
    Route::get('/paginate',     [WeaponController::class, 'paginate']); // Paginación
    Route::get('/', [WeaponController::class, 'index']); // Todas las armas
    Route::get('/{id}', [WeaponController::class, 'show']); // Un arma específico
});

Route::prefix('api/characters')->group(function () {
    Route::get('/paginate', [CharacterController::class, 'paginate']); // Paginación
    Route::get('/', [CharacterController::class, 'index']); // Todos los personajes
    Route::get('/{id}', [CharacterController::class, 'show']); // Un personaje específico
});

Route::prefix('api/artifacts')->group(function () {
    Route::get('/paginate', [ArtifactController::class, 'paginate']);
    Route::get('/', [ArtifactController::class, 'index']);
    Route::get('/{id}', [ArtifactController::class, 'show']);
});

Route::prefix('api/teams')->group(function () {
    Route::get('/', [TeamController::class, 'index']); // Todos los equipos
    Route::get('/{characterName}', [TeamController::class, 'findByCharacter']); // Todos los equipos de un personaje
    Route::get('/{id}', [TeamController::class, 'show']); // Un equipo específico
});
