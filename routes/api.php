<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\API\WeaponController;
use App\Http\Controllers\API\ArtifactController;
use App\Http\Controllers\API\TeamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('weapons')->group(function () {
    Route::get('/paginate',     [WeaponController::class, 'paginate']); // Paginación
    Route::get('/', [WeaponController::class, 'index']); // Todas las armas
    Route::get('/{id}', [WeaponController::class, 'show']); // Un arma específico
});

Route::prefix('characters')->group(function () {
    Route::get('/paginate', [CharacterController::class, 'paginate']); // Paginación
    Route::get('/', [CharacterController::class, 'index']); // Todos los personajes
    Route::get('/{id}', [CharacterController::class, 'show']); // Un personaje específico
});

Route::prefix('artifacts')->group(function () {
    Route::get('/paginate', [ArtifactController::class, 'paginate']);
    Route::get('/', [ArtifactController::class, 'index']);
    Route::get('/{id}', [ArtifactController::class, 'show']);
});

Route::prefix('teams')->group(function () {
    Route::get('/', [TeamController::class, 'index']); // Todos los equipos
    Route::get('/{characterName}', [TeamController::class, 'findByCharacter']); // Todos los equipos de un personaje
    Route::get('/{id}', [TeamController::class, 'show']); // Un equipo específico
});
