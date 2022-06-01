<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::resource('/services' ,   \App\Http\Controllers\Api\ApiServecesController::class );
    Route::resource('/bookings' ,   \App\Http\Controllers\Api\ApiBookingController::class );
    Route::resource('/contacts' ,   \App\Http\Controllers\Api\ApiContactController::class );
    Route::resource('/barbers',\App\Http\Controllers\Api\ApiBarberController::class);


