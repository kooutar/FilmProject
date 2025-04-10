<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('payment/create', [PaymentController::class, 'createPayment']);
Route::get('payment/status', [PaymentController::class, 'paymentStatus'])->name('payment.status');
Route::get('payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::get('/home',function(){
    return view('home');
  });