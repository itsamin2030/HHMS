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

Route::get('/verify', 'MobileController@verify');
Route::post('/verify', 'MobileController@checkVerify');
// appointment
Route::get('/appointment/getcount','MobileController@readCountAppointment');
Route::get('/appointment/list','MobileController@getAppointmentlist');
Route::put('/appointment/patupdate','MobileController@updateAppointmentByPat');
// vital
Route::get('/vital/list','MobileController@getVitallist');
Route::post('/vital/create','MobileController@createVital');
Route::delete('/vital/destroy','MobileController@deleteVital');
