<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

Auth::routes();
Route::resource('profile','ProfilesController');
Route::resource('book','BooksController');
Route::resource('category','CategoriesController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::post('/search','SearchController@search')->name('search');
