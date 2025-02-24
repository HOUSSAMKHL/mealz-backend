<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/dbconnection',function(){
    return view('dbconnection');
});


Route::get('/meals', [MealController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index']);


?>