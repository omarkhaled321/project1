<?php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FlightController;


Route::get('/users', [UserController::class, 'index']);
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{flight}/passengers', [FlightController::class, 'passengers']);