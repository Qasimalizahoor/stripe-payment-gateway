<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stripe\StripePaymentController;
use App\Http\Controllers\StripeV1\StripePaymentControllerV1;

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

Route::get('/', function () {
    return view('welcome');
});

// Tradational Way to define Route in Laravel
// Route::get('stripe',[StripePaymentController::class,'stripe']);
// Route::post('stripe',[StripePaymentController::class,'stripePost'])->name('stripe');
 

// Stripe Payment Gateway V1.0
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe','stripe');
    Route::post('stripe','stripePost')->name('stripe.post');
});


// Stripe Payment Gateway V1.1

Route::controller(StripePaymentControllerV1::class)->group(function(){
    Route::get('stripe-v1','stripe');
    Route::post('stripe-v1','stripePost')->name('stripe.post.v1');
});