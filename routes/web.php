<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\PaymentController::class, 'getPayment'])->name('payment');

Route::view('/create-pay', 'application.payment.payment-create')->name('payment.create');

Route::post('/processing-payment', [App\Http\Controllers\PaymentController::class, 'processingPayment'])->name('payment.processing');

Route::get('/show-payment/{payment}', [App\Http\Controllers\PaymentController::class, 'showPayment'])->name('payment.show');

Route::delete('/delete-payment/{payment}', [App\Http\Controllers\PaymentController::class, 'deletePayment'])->name('payment.delete');
