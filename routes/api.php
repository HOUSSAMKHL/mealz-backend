<?php


use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderMealController;

Route::apiResource('orders', OrderController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('Plans', PlanController::class);
Route::apiResource('meals', MealController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('order_meal', OrderMealController::class); 




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::put('/plans/{id}', [PlanController::class, 'update']);