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

Route::middleware('auth:api')->post('/new-subscribe', 'SubscraptionUserController@store');
//Route::middleware('auth:api')->post('/list-of-my-subscribtions', 'SubscraptionUserController@listAll');