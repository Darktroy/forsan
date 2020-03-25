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
//AddNewTicket
Route::middleware('auth:api')->post('/list-tickets', 'TicketController@ListTickets');
Route::middleware('auth:api')->post('/add-new-ticket', 'TicketController@AddNewTicket');
Route::middleware('auth:api')->post('/add-ticket-replay', 'TicketController@AddReplayTicket');
Route::middleware('auth:api')->post('/show-ticket-details', 'TicketController@ListOneTicketDetails');