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
// auth
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');
Route::get('myAccount','Api\AuthController@myAccount');
Route::post('changePassword','Api\AuthController@changePassword');
Route::post('userUpdate','Api\AuthController@userUpdate');
//meet
// Route::get('meetings/editMeetings/{mid}','Api\MeetingsController@editMeetings')->middleware('jwtAuth');
// Route::get('meetings','Api\MeetingsController@meetings')->middleware('jwtAuth');
// Route::get('meetingss','Api\MeetingsController@meetingss')->middleware('jwtAuth');

Route::get('meetings/listMeetings','Api\MeetingsController@listMeetings')->middleware('jwtAuth');

Route::get('meetings/listMeetingsToday','Api\MeetingsController@listMeetingsToday')->middleware('jwtAuth');
// Route::get('meetings/myNotulas/{meetingsid}','Api\MeetingsController@myNotulas')->middleware('jwtAuth');
Route::get('meetings/detailMeetings/{mid}','Api\MeetingsController@detailMeetings')->middleware('jwtAuth');
Route::post('meetings/delete','Api\MeetingsController@delete')->middleware('jwtAuth');
Route::post('meetings/create','Api\MeetingsController@create')->middleware('jwtAuth');
Route::post('meetings/update','Api\MeetingsController@update')->middleware('jwtAuth');
Route::get('meetings/spinner','Api\MeetingsController@spinner');

//attendaces attendances
Route::get('attendances/detailAttendances/{aid}','Api\AttendancesController@detailAttendances')->middleware('jwtAuth');
Route::get('attendances/listAttendances/{mid}','Api\AttendancesController@listAttendances')->middleware('jwtAuth');
Route::post('attendances/delete','Api\AttendancesController@delete')->middleware('jwtAuth');
Route::post('attendances/create','Api\AttendancesController@create')->middleware('jwtAuth');
Route::post('attendances/update','Api\AttendancesController@update')->middleware('jwtAuth');


// notula
Route::post('notulas/create','Api\NotulasController@create')->middleware('jwtAuth');
Route::post('notulas/update','Api\NotulasController@update')->middleware('jwtAuth');
Route::post('notulas/delete','Api\NotulasController@delete')->middleware('jwtAuth');
Route::get('notulas/listNotulas/{mid}','Api\NotulasController@listNotulas')->middleware('jwtAuth');
Route::get('notulas/detailNotulas/{nid}','Api\NotulasController@detailNotulas')->middleware('jwtAuth');
// Route::get('notulas/editNotulas/{nid}','Api\NotulasController@editNotulas')->middleware('jwtAuth');
Route::get('notulas','Api\NotulasController@notulas')->middleware('jwtAuth');
// Route::get('notulas/notulasMeetings/{mid}','Api\NotulasController@notulasMeetings')->middleware('jwtAuth');

//points
Route::get('points','Api\PointsController@points')->middleware('jwtAuth');
Route::get('points/listPoints/{nid}','Api\PointsController@listPoints')->middleware('jwtAuth');
Route::get('points/detailPoints/{pid}','Api\PointsController@detailPoints')->middleware('jwtAuth');
Route::post('points/delete','Api\PointsController@delete')->middleware('jwtAuth');
Route::post('points/create','Api\PointsController@create')->middleware('jwtAuth');
Route::post('points/update','Api\PointsController@update')->middleware('jwtAuth');

//followUp
// Route::get('followUp','Api\FollowUpController@followUp')->middleware('jwtAuth');
Route::get('followUp/listFollowUp/{nid}','Api\FollowUpController@listFollowUp')->middleware('jwtAuth');
Route::get('followUp/detailFollowUp/{pid}','Api\FollowUpController@detailFollowUp')->middleware('jwtAuth');
Route::post('followUp/delete','Api\FollowUpController@delete')->middleware('jwtAuth');
Route::post('followUp/create','Api\FollowUpController@create')->middleware('jwtAuth');
Route::post('followUp/update','Api\FollowUpController@update')->middleware('jwtAuth');
//photos
Route::post('photos/create','Api\PhotosController@create')->middleware('jwtAuth');
Route::post('photos/delete','Api\PhotosController@delete')->middleware('jwtAuth');
Route::post('photos/update','Api\PhotosController@update')->middleware('jwtAuth');
// Route::get('posts','Api\PhotosController@posts')->middleware('jwtAuth');
Route::get('photos/listPhotos/{mid}','Api\PhotosController@listPhotos')->middleware('jwtAuth');
Route::get('photos','Api\PhotosController@photos')->middleware('jwtAuth');
Route::get('photos/detailPhotos/{pid}','Api\PhotosController@detailPhotos')->middleware('jwtAuth');


