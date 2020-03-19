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
Route::middleware('auth:api')->post('/list-of-my-subscribtions', 'UserToSubscriptionController@listAll');
Route::middleware('auth:api')->post('/list-one-subscribtion', 'UserToSubscriptionController@listOne');
Route::middleware('auth:api')->post('/renew-one-subscribtion', 'UserToSubscriptionController@renewOne');
Route::middleware('auth:api')->post('/edit-one-subscribtion', 'UserToSubscriptionController@editOne');
Route::middleware('auth:api')->post('/change-pickup-location-subscribtion', 'UserToSubscriptionController@changePickupOne');