<?php

use Illuminate\Http\Request;

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

Route::group([
    'namespace' => 'Auth\Http\Controllers'
], function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    Route::group([
        'middleware' => 'auth.jwt'
    ], function() {
        Route::get('test', function() {
            return response()->json(['message' => 'you are authenticated']);
        });
    });
});

Route::group([
    'namespace' => 'User\Http\Controllers',
    'middleware' => 'auth.jwt'
], function() {
    Route::get('users', 'UserController@index');
});
