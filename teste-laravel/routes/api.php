<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CobrancasController;

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

Route::group([], function () {
    Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index']);
    Route::get('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show']);
    Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store']);
    Route::patch('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy']);
});

Route::group(['prefix' => 'cobrancas'], function () {
    Route::get('/', [App\Http\Controllers\CobrancasController::class, 'index']); 
    Route::post('/{cliente}', [App\Http\Controllers\CobrancasController::class, 'store']);
    Route::get('/{cobranca}', [App\Http\Controllers\CobrancasController::class, 'show']); 
    Route::patch('/{cobranca}', [App\Http\Controllers\CobrancasController::class, 'update']);
    Route::delete('/{cobranca}', [App\Http\Controllers\CobrancasController::class, 'destroy']); 
    Route::get('/cliente/{cliente}', [App\Http\Controllers\CobrancasController::class, 'indexByClient']); 
    Route::get('/vencimento/{data}', [App\Http\Controllers\CobrancasController::class, 'indexByDueDate']); 
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});