<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->group(function () {
    Route::apiResource('tours', 'App\Http\Controllers\API\TourController');
    Route::apiResource('destinations', 'App\Http\Controllers\API\DestinationController');
    Route::apiResource('tickets', 'App\Http\Controllers\API\TicketController');
    Route::apiResource('bookings', 'App\Http\Controllers\API\BookingController');

    Route::get('stats', [HomeController::class, 'stats'])->name('dashboard.stats');
});
