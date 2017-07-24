<?php

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

// Gets

Route::get('/', 'Controller@retornaRegistro');

Route::get('/cadastro', 'Controller@cadastro');

Route::get('/cadastro/{id}', 'Controller@editarProdutos');

Route::get('/categorias', 'Controller@retornaRegistroCategorias');

Route::get('/del/{id}', 'Controller@deletarRegistro');

Route::get('/delcat/{id}', 'Controller@deletarCategoria');

Route::get('/logar','Controller@logar');

// Posts

// Route::post('/login', 'Controller@login');

Route::post('/sav', 'Controller@salvarRegistro');

Route::post('/savcat', 'Controller@salvarCategorias');

Route::post('/savedit', 'Controller@salvarEditarRegistro');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
