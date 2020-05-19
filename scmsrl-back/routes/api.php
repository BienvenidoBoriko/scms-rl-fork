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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('/v1/login', 'API\V1\AuthController@login');
Route::group(['middleware' => ['auth:api'],'prefix'=> 'v1'], function () {
    Route::apiResource('/users', 'API\V1\UserController');
    Route::apiResource('/posts', 'API\V1\PostController');
    Route::apiResource('/tags', 'API\V1\TagController');
    Route::apiResource('/categories', 'API\V1\CategoryController');
    Route::apiResource('/settings', 'API\V1\SettingController');
    Route::fallback(function () {
        return response()->json([
        'error' => 'Page Not Found. If error persists, contact bienvenidoborico@gmail.com'], 404);
    });
});