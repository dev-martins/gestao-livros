<?php

use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});


Route::group(['middleware' => ['auth:api']], function () {
    Route::prefix('assunto')->group(function () {
        Route::get('', [AssuntoController::class, 'todosAssuntos']);
        Route::post('', [AssuntoController::class, 'addAssunto']);
        Route::put('{id}', [AssuntoController::class, 'atualizarAssunto']);
        Route::delete('{id}', [AssuntoController::class, 'removerAssunto']);
    });

    Route::prefix('livro')->group(function () {
        Route::get('', [LivrosController::class, 'todosLivros']);
        Route::post('', [LivrosController::class, 'addLivro']);
        Route::put('{id}', [LivrosController::class, 'atualizarLivro']);
        Route::delete('{id}', [LivrosController::class, 'removerLivro']);
    });

    Route::prefix('autor')->group(function () {
        Route::get('', [AutorController::class, 'todosAutores']);
        Route::post('', [AutorController::class, 'addAutor']);
        Route::put('{id}', [AutorController::class, 'atualizarAutor']);
        Route::delete('{id}', [AutorController::class, 'removerAutor']);
    });

    Route::prefix('usuario')->group(function () {
        Route::get('', [UsuariosController::class, 'todosUsuarios']);
        Route::post('', [UsuariosController::class, 'addUsuario']);
        Route::put('{id}', [UsuariosController::class, 'atualizarUsuario']);
        Route::delete('{id}', [UsuariosController::class, 'removerUsuario']);
    });


    Route::prefix('auth')->group(function () {
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
