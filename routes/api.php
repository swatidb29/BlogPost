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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('blogs', 'UserBlogController@index');
Route::get('blogs/{id}', 'UserBlogController@show');
Route::post('blogs', 'UserBlogController@store');
Route::put('blogs/{id}', 'UserBlogController@update');
Route::delete('blogs/{id}', 'UserBlogController@delete');
Route::get('blogs/{id}', 'UserBlogController@show');

