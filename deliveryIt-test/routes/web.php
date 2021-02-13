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

Route::get('/provas', 'ProvasController@index');
Route::get('/provas/create', 'ProvasController@create');
Route::post('/provas/store', 'ProvasController@store');
Route::get('/provas/edit/{id}', 'ProvasController@edit');
Route::put('/provas/update/{id}', 'ProvasController@update');
// Route::post('/provas/delete', 'ProvasController@delete');

