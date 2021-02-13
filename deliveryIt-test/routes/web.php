<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/corredores', 'CorredoresController');

Route::get('/corredores', 'CorredoresController@index');
Route::get('/corredores/create', 'CorredoresController@create');
Route::post('/corredores/store', 'CorredoresController@store');
Route::get('/corredores/edit/{id}', 'CorredoresController@edit');
Route::put('/corredores/update/{id}', 'CorredoresController@update');
// Route::post('/corredores/delete', 'CorredoresController@delete');
Route::get('/corredores-select2', 'CorredoresController@dataAjax');

Route::get('/provas', 'ProvasController@index');
Route::get('/provas/create', 'ProvasController@create');
Route::post('/provas/store', 'ProvasController@store');
Route::get('/provas/edit/{id}', 'ProvasController@edit');
Route::put('/provas/update/{id}', 'ProvasController@update');
// Route::post('/provas/delete', 'ProvasController@delete');
Route::get('/provas-select2', 'ProvasController@dataAjax');

Route::get('/corredores-provas', 'CorredoresProvasController@index');
Route::get('/corredores-provas/create', 'CorredoresProvasController@create');
Route::post('/corredores-provas/store', 'CorredoresProvasController@store');
Route::get('/corredores-provas/edit/{id}', 'CorredoresProvasController@edit');
Route::put('/corredores-provas/update/{id}', 'CorredoresProvasController@update');
// Route::post('/corredores-provas/delete', 'CorredoresProvasController@delete');

Route::get('/resultados', 'ResultadosController@index');
Route::get('/resultados/create', 'ResultadosController@create');
Route::post('/resultados/store', 'ResultadosController@store');
Route::get('/resultados/edit/{id}', 'ResultadosController@edit');
Route::put('/resultados/update/{id}', 'ResultadosController@update');
// Route::post('/resultados/delete', 'ResultadosController@delete');

Route::get('/classificacao/{id}', 'ClassificacaoController@index');
Route::get('/classificacao/{id}/{idade}', 'ClassificacaoController@classificaoIdade');


