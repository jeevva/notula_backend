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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');
Route::get('myAccount','Api\AuthController@myAccount');

Route::post('notulas/delete','Api\NotulasController@delete')->middleware('jwtAuth');
Route::get('notulas/myNotulas','Api\NotulasController@myNotulas')->middleware('jwtAuth');
Route::get('notulas','Api\NotulasController@notulas')->middleware('jwtAuth');
