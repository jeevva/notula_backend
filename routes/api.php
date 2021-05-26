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
// auth route
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');
Route::get('myAccount','Api\AuthController@myAccount');
//meet
Route::get('meetings/editMeetings/{mid}','Api\MeetingsController@editMeetings')->middleware('jwtAuth');
Route::get('meetings','Api\MeetingsController@meetings')->middleware('jwtAuth');
Route::get('meetings/myMeetings','Api\MeetingsController@myMeetings')->middleware('jwtAuth');
Route::get('meetings/myNotulas/{meetingsid}','Api\MeetingsController@myNotulas')->middleware('jwtAuth');
Route::get('meetings/detailMeetings/{meetingsid}','Api\MeetingsController@detailMeetings')->middleware('jwtAuth');
Route::post('meetings/delete','Api\MeetingsController@delete')->middleware('jwtAuth');
Route::post('meetings/create','Api\MeetingsController@create')->middleware('jwtAuth');
Route::post('meetings/update','Api\MeetingsController@update')->middleware('jwtAuth');

//attendaces attendances
Route::get('attendances/detailAttendances/{aid}','Api\AttendancesController@detailAttendances')->middleware('jwtAuth');
Route::get('attendances/listAttendances/{meetingsid}','Api\AttendancesController@listAttendances')->middleware('jwtAuth');
Route::post('attendances/delete','Api\AttendancesController@delete')->middleware('jwtAuth');
Route::post('attendances/create','Api\AttendancesController@create')->middleware('jwtAuth');
Route::post('attendances/update','Api\AttendancesController@update')->middleware('jwtAuth');


// notula
Route::post('notulas/create','Api\NotulasController@create')->middleware('jwtAuth');
Route::post('notulas/delete','Api\NotulasController@delete')->middleware('jwtAuth');
Route::get('notulas/detailNotulas/{nid}','Api\NotulasController@detailNotulas')->middleware('jwtAuth');
Route::get('notulas','Api\NotulasController@notulas')->middleware('jwtAuth');

//points
// Route::get('points','Api\PointsController@points')->middleware('jwtAuth');
Route::get('points','Api\PointsController@points')->middleware('jwtAuth');



