<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Não precisam de login
Route::get('/auth/login', [
    'as' => 'login',
    'uses' =>'AuthController@index'
]);

Route::post('/auth/login', 'AuthController@create');
// %$%#$%#$

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [
        'as' => 'home',
        'uses' => 'UnidadesController@index'
    ]);

    Route::get('/unidades/{codUnidade}/atendimentos', [
        'as' => 'atendimentoUnidades',
        'uses' => 'AtendimentosController@index'
    ])
    ->where('codUnidade', '[0-9]+');

    Route::get('/atendimentos/{id}', [
        'as' => 'atendimentoShow',
        'uses' => 'AtendimentosController@show'
    ])
    ->where('id', '[0-9]+');

    Route::get('/auth/logout', [
        'as' => 'logout',
        'uses' =>'AuthController@destroy'
    ]);

    Route::get('/sessions', [
        'as' => 'sessions',
        'uses' =>'SessionsController@index'
    ]);
});
