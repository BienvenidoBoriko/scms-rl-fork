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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create')->name('post.create');

Route::get('/author', 'UserController@index')->name('author.index');
Route::get('/author/create', 'UserController@create')->name('author.create');
Route::post('/author/store', 'UserController@create')->name('author.store');

Route::get('/tag', 'TagController@index')->name('tag.index');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::post('/tag/store', 'TagController@store')->name('tag.store');
