<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/', 'BooksController@index');
Route::get('/books', 'BooksController@index');
Route::get('/books/create', 'BooksController@create');
Route::get('/books/list', 'BooksController@list');
Route::get('/books/update/{id}', 'BooksController@update');
Route::get('/books/{id}', 'BooksController@show');
Route::post('/books', 'BooksController@store');
Route::put('/books', 'BooksController@edit');
Route::delete('/books/{id}', 'BooksController@destroy');


Route::post('/users/loginNow', 'UsersController@loginCredentials');
Route::get('/users/login', 'UsersController@login');
Route::get('/users/logout', 'UsersController@logout');
Route::get('/users/register', 'UsersController@register');
Route::post('/users/register', 'UsersController@registerCredentials');
