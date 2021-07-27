<?php

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
Route::get('/privacy-policy', function () {
    return view('privacypolicy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/notula/{id}', 'HomeController@notula')->name('notula');
Route::get('/notulas/{id}', 'HomeController@notulas')->name('notulas');
Route::get('/photos/{photo}', 'HomeController@photos')->name('photos');

Route::get('/generate-pdf','HomeController@generatePDF');

