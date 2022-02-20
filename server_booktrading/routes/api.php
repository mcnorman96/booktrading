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

Route::get('/books', 'BooksController@index');
Route::get('/books/{id}', 'BooksController@show');
Route::post('/books', 'BooksController@store');
Route::post('/books/list', 'BooksController@list');
Route::put('/books', 'BooksController@update');
Route::delete('/books/{id}', 'BooksController@destroy');

Route::get('/genres', 'GenresController@index');

Route::post('/users/login', 'UsersController@login');
Route::post('/users/register', 'UsersController@register');
