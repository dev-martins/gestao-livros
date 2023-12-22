<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', function () {
    return view('login');
});

Route::prefix('dash')->group(function(){
    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::get('/livro', function () {
        return view('dashboard.pages.livros');
    });

    Route::get('/assunto', function () {
        return view('dashboard.pages.assuntos');
    });

    Route::get('/autor', function () {
        return view('dashboard.pages.autores');
    });
});


