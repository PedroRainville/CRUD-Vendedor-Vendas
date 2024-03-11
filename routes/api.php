<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Vendedor;
use App\Models\Venda;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VendaController;
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

Route::get('/vendedor', [VendedorController::class, 'index']);
Route::get('/venda', [VendaController::class, 'index']);

Route::get('/venda/{id}', [VendaController::class, 'show']);
Route::get('/vendedor/{id}', [VendedorController::class, 'show']);

Route::post('/venda', [VendaController::class, 'store']);
Route::post('/vendedor', [VendedorController::class, 'store']);

Route::put('/atualizar-vendedor/{id}', [VendedorController::class, 'update']);
Route::put('/atualizar-venda/{id}', [VendaController::class, 'update']);

Route::delete('/deletar-vendedor/{id}', [VendedorController::class, 'destroy']);
Route::delete('/deletar-venda/{id}', [VendaController::class, 'destroy']);

Route::get('/vendedores/{id_vendedor}/vendas', [VendaController::class, 'tudo']);
