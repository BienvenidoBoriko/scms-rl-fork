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
Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::post('/posts/store', 'PostController@store')->name('post.store');

Route::get('/authors', 'UserController@index')->name('author.index');
Route::get('/authors/create', 'UserController@create')->name('author.create');
Route::post('/authors/store', 'Auth\RegisterController@create')->name('author.store');

Route::get('/tags', 'TagController@index')->name('tag.index');
Route::get('/tags/create', 'TagController@create')->name('tag.create');
Route::post('/tags/store', 'TagController@store')->name('tag.store');

Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/categories/create', 'CategoryController@create')->name('category.create');
Route::post('/categories/store', 'CategoryController@store')->name('category.store');
