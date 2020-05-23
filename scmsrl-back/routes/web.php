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


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/posts/create', 'PostController@create')->name('post.create');
    Route::post('/posts/store', 'PostController@store')->name('post.store');
    Route::post('/posts/image/upload', 'PostController@upload')->name('post.image.upload');
    Route::post('/posts/filter', 'PostController@filterBy')->name('post.filter');
    Route::delete('/posts/{id}', 'PostController@destroy')->name('post.destroy');
    Route::post('/posts/{id}/changeStatus', 'PostController@changeStatus')->name('post.changeStatus');
    Route::get('/posts/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/posts/{id}', 'PostController@update')->name('post.update');

    Route::get('/authors', 'UserController@index')->name('author.index');
    Route::get('/authors/create', 'UserController@create')->name('author.create');
    Route::post('/authors/store', 'UserController@store')->name('author.store');
    Route::post('/authors/filter', 'UserController@filterBy')->name('author.filter');
    Route::delete("/authors/{id}", 'UserController@destroy')->name('author.destroy');
    Route::get('/authors/{id}/edit', 'UserController@edit')->name('author.edit');
    Route::put('/authors/{id}', 'UserController@update')->name('author.update');

    Route::get('/tags', 'TagController@index')->name('tag.index');
    Route::get('/tags/create', 'TagController@create')->name('tag.create');
    Route::post('/tags/store', 'TagController@store')->name('tag.store');
    Route::post('/tags/filter', 'TagController@filterBy')->name('tag.filter');
    Route::delete('/tags/{id}', 'TagController@destroy')->name('tag.destroy');
    Route::get('/tags/{id}/edit', 'TagController@edit')->name('tag.edit');
    Route::put('/tags/{id}', 'TagController@update')->name('tag.update');

    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/categories/create', 'CategoryController@create')->name('category.create');
    Route::post('/categories/store', 'CategoryController@store')->name('category.store');
    Route::post('/categories/filter', 'CategoryController@filterBy')->name('category.filter');
    Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('/categories/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/categories/{id}', 'CategoryController@destroy')->name('category.destroy');

    //Route::get('/settings', 'SettingController@index')->name('setting.index');
    Route::get('/settings', 'SettingController@index')->name('setting.index');
    Route::post('/settings/update', 'SettingController@store')->name('setting.store');
});