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

Route::middleware('auth:api')->post('/list-subscriptions-types', 'SubscriptionTypeController@listAll');
Route::middleware('auth:api')->post('/list-period-types', 'SubscriptionTypeController@listPeriods');
Route::middleware('auth:api')->post('/list-way-types', 'SubscriptionTypeController@listWays');
Route::post('/forsan-home', 'SubscriptionTypeController@home');
Route::middleware('auth:api')->post('/test', 'SubscriptionTypeController@test');
