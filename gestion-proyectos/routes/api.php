<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniaController;
use App\Http\Controllers\HistoriaUsuarioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TicketController;

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

// Usuarios
Route::post('/registro', [AuthController::class, 'register'])->name('registro');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout'])->name('logout');

// Companias
Route::apiResource('companias',CompaniaController::class);

Route::middleware('auth:sanctum')->get('tickets/historia/{historiaUsuarioId}', [TicketController::class, 'getByHistoriaId']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('proyectos',ProyectoController::class);
    Route::apiResource('historias',HistoriaUsuarioController::class);
    Route::apiResource('tickets',TicketController::class);
    Route::get('/proyectos/{proyectoId}/historias', [HistoriaUsuarioController::class, 'getByProyecto'])
    ->name('proyectos.historias');
});
