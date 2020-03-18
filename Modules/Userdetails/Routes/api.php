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

Route::post('login', 'UserdetailsController@login');
Route::post('register', 'UserdetailsController@register');


Route::middleware('auth:api')->get('/userdetails', function (Request $request) {
    return $request->user();
});
