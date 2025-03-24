<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::resource('Auth', UserController::class);
Route::post('/login',[UserController::class,'login']);


Route::middleware(['auth:api',AdminMiddleware::class])->group(function(){
    Route::resource('Film',FilmController::class);
    Route::resource('Session',SessionController::class);
    Route::resource('salle',SalleController::class);
});


Route::middleware(['auth:api',ClientMiddleware::class])->group(function(){
    Route::resource('Reservation',ReservationController::class);   
});



