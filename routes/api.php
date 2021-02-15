<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->name('api.')->group(function(){
    Route::prefix('classificacao/prova/{id}')->group(function(){
        Route::get('/', 'ClassificacaoController@index');
        Route::get('/{idade}', 'ClassificacaoController@show');
    });

    Route::prefix('corredores')->group(function(){
        Route::get('/', 'CorredoresController@index');
        Route::get('/{id}', 'CorredoresController@show');
        Route::post('/', 'CorredoresController@store');
        Route::put('/{id}', 'CorredoresController@update');
        Route::delete('/{id}', 'CorredoresController@delete');
    });

    Route::prefix('provas')->group(function(){
        Route::get('/', 'ProvasController@index');
        Route::get('/{id}', 'ProvasController@show');
        Route::post('/', 'ProvasController@store');
        Route::put('/{id}', 'ProvasController@update');
        Route::delete('/{id}', 'ProvasController@delete');
    });

    Route::prefix('corredoresProvas')->group(function(){
        Route::get('/', 'CorredoresProvasController@index');
        Route::get('/{id}', 'CorredoresProvasController@show');
        Route::post('/', 'CorredoresProvasController@store');
        Route::put('/{id}', 'CorredoresProvasController@update');
        Route::delete('/{id}', 'CorredoresProvasController@delete');
    });

    Route::prefix('resultados')->group(function(){
        Route::get('/', 'ResultadosController@index');
        Route::get('/{id}', 'ResultadosController@show');
        Route::post('/', 'ResultadosController@store');
        Route::put('/{id}', 'ResultadosController@update');
        Route::delete('/{id}', 'ResultadosController@delete');
    });
});
