<?php

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

Route::get('/', function () {
    return response()->json('service-subscribers v1.0');
});

Route::get('/services', 'ServiceController@index');
Route::get('/services/{id}', 'ServiceController@show');
Route::get('/services/{id}/users', 'ServiceController@getUsers');
Route::post('/services/{id}/users', 'ServiceController@addUser');
Route::get('/services/{id}/users/{user_id}', 'ServiceController@getUser');
Route::delete('/services/{id}/users/{user_id}', 'ServiceController@removeUser');
