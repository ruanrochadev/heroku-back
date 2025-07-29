<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstabelecimentoController;
use App\Http\Controllers\TransportadorController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\RefinariaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/ola', function () {
//     echo "Olá Mundo !!";
// });

Route::get('ola', [HomeController::class, 'index']);

Route::get('estabelecimentos', [EstabelecimentoController::class, 'index'])->name('indexEstab');
Route::get('estabelecimentos/{id}', [EstabelecimentoController::class, 'show'])->name('showEstab');

// //Create
// Route::get('/produto', [ProdutoController::class, 'create']);
// Route::post('/produtos', [ProdutoController::class, 'store']);
Route::get('/estabelecimento', [EstabelecimentoController::class, 'create'])->name('createEstab');
Route::post('/estabelecimentos', [EstabelecimentoController::class, 'store'])->name('storeEstab');


// //update
// Route::get('/produto/{id}/edit',[ProdutoController::class, 'edit'])->name('edit');
    // Route::post('/produto/{id}/update',[ProdutoController::class, 'update'])->name('update');
    Route::get('/estabelecimentos/{id}/edit', [EstabelecimentoController::class, 'edit'])->name('editEstab');
    Route::post('/estabelecimentos/{id}', [EstabelecimentoController::class, 'update'])->name('updateEstab');

// //Delete
// Route::get('/produto/{id}/delete',[ProdutoController::class, 'delete'])->name('delete');
// Route::post('/produto/{id}/remove',[ProdutoController::class, 'remove'])->name('removeProduto');
Route::get('/estabelecimentos/delete/{id}', [EstabelecimentoController::class, 'delete'])->name('deleteEstab');
Route::post('/estabelecimentos/remove/{id}', [EstabelecimentoController::class, 'remove'])->name('removeEstab');


// Transportadores

Route::get('transportadores', [TransportadorController::class, 'index'])->name('indexTransp');
Route::get('transportadores/{id}', [TransportadorController::class, 'show'])->name('showTransp');

// Create
Route::get('/transportador', [TransportadorController::class, 'create'])->name('createTransp');
Route::post('/transportadores', [TransportadorController::class, 'store'])->name('storeTransp');

// Update
Route::get('/transportadores/edit/{id}', [TransportadorController::class, 'edit'])->name('editTransp');
Route::post('/transportadores/{id}', [TransportadorController::class, 'update'])->name('updateTransp');

// Delete
Route::get('/transportadores/delete/{id}', [TransportadorController::class, 'delete'])->name('deleteTransp');
Route::post('/transportadores/remove/{id}', [TransportadorController::class, 'remove'])->name('removeTransp');


// Administradores

Route::get('administradores', [AdministradorController::class, 'index'])->name('indexAdm');
Route::get('administradores/{id}', [AdministradorController::class, 'show'])->name('showAdm');

// Create
Route::get('/administrador', [AdministradorController::class, 'create'])->name('createAdm');
Route::post('/administradores', [AdministradorController::class, 'store'])->name('storeAdm');

// Update
Route::get('/administradores/edit/{id}', [AdministradorController::class, 'edit'])->name('editAdm');
Route::post('/administradores/{id}', [AdministradorController::class, 'update'])->name('updateAdm');

// Delete
Route::get('/administradores/delete/{id}', [AdministradorController::class, 'delete'])->name('deleteAdm');
Route::post('/administradores/remove/{id}', [AdministradorController::class, 'remove'])->name('removeAdm');


Route::resource('refinaria', RefinariaController::class);
