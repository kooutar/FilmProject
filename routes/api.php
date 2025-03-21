<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::resource('Auth', UserController::class);
Route::post('/login',[UserController::class,'login']);
Route::middleware(['auth:api'])->group(function(){
    Route::resource('Film',FilmController::class);
});



