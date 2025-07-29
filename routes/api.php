<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\TransportadorController;
use App\Http\Controllers\Api\AdministradorController;
use App\Http\Controllers\Api\ColetaController;
use App\Http\Controllers\Api\EstabelecimentoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
// rota publica
Route::post('/login', [LoginController::class, 'login']);
Route::post('/users', [UserController::class, 'store']);

// rotas get publicas
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/coletas', [ColetaController::class, 'index']);
Route::get('/coletas/{coleta}', [ColetaController::class, 'show']);
Route::get('/coletas-disponiveis', [ColetaController::class, 'disponiveis']);
Route::get('/estabelecimentos', [EstabelecimentoController::class, 'index']);
Route::get('/estabelecimentos/{estabelecimento}', [EstabelecimentoController::class, 'show']);
Route::get('/transportador', [TransportadorController::class, 'index']);
Route::get('/transportador/{transportador}', [TransportadorController::class, 'show']);

// rotas protegidas com autenticaçao
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware('ability:is-admin,is-estabelecimento,is-transportador')->group(function () {
        Route::post('/coletas', [ColetaController::class, 'store']);
        Route::put('/coletas/{coleta}', [ColetaController::class, 'update']);
        Route::delete('/coletas/{coleta}', [ColetaController::class, 'destroy']);
    });
    
    //  apenas proprios dados / admin
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
    
    //   admin e estabelecimentos tem acesso
    Route::middleware('ability:is-admin,is-estabelecimento')->group(function () {
        Route::post('/estabelecimentos', [EstabelecimentoController::class, 'store']);
        Route::put('/estabelecimentos/{estabelecimento}', [EstabelecimentoController::class, 'update']);
        Route::delete('/estabelecimentos/{estabelecimento}', [EstabelecimentoController::class, 'destroy']);
    });
    
    //   admin e transportadores tem acesso liberado
    Route::middleware('ability:is-admin,is-transportador')->group(function () {
        Route::post('/transportador', [TransportadorController::class, 'store']);
        Route::put('/transportador/{transportador}', [TransportadorController::class, 'update']);
        Route::delete('/transportador/{transportador}', [TransportadorController::class, 'destroy']);
    });
    
    Route::middleware('ability:is-admin')->group(function () {
    Route::get('/admin/users', [UserController::class, 'getAllUsersForAdmin']);
    Route::delete('/admin/users/{id}', [UserController::class, 'deleteUserAsAdmin']);
});
});

