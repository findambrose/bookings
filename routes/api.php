<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('tours', 'App\Http\Controllers\API\TourController');
    Route::apiResource('destinations', 'App\Http\Controllers\API\DestinationController');
    Route::apiResource('tickets', 'App\Http\Controllers\API\TicketController');
    Route::apiResource('bookings', 'App\Http\Controllers\API\BookingController');
});

//Wrap them in a Route::middleware('auth:sanctum') group to protect them with Sanctum authentication:
