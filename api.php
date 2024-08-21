<?php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;


Route::get('/users', [UserController::class, 'index']);
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{flight}/passengers', [FlightController::class, 'passengers']);
Route::apiResource('posts', PostController::class);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
});