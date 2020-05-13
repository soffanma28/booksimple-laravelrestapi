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

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('books')->group(function(){
	Route::get('index', 'API\BookController@index');
	Route::get('{book}/show', 'API\BookController@show');
	Route::post('store', 'API\BookController@store');
	Route::post('update', 'API\BookController@update');
	Route::post('destroy', 'API\BookController@destroy');
});

