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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-payments', [App\Http\Controllers\PaymentController::class, 'endpointGetPayments']);

Route::get('/get-payments/tarjet/{tarjet}', [App\Http\Controllers\PaymentController::class, 'endpointGetPaymentTarjet']);

Route::get('/get-payments/amount/{amount}', [App\Http\Controllers\PaymentController::class, 'endpointGetPaymentAmount']);

Route::get('/get-payment/{payment}', [App\Http\Controllers\PaymentController::class, 'endpointGetPayment']);

Route::get('/delete-payment/{payment}', [App\Http\Controllers\PaymentController::class, 'endpointDeletePayment']);
