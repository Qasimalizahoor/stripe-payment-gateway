<?php

use App\Http\Controllers\Stripe\StripePaymentController;
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

Route::get('/', function () {
    return view('welcome');
});

// Tradational Way to define Route in Laravel
// Route::get('stripe',[StripePaymentController::class,'stripe']);
// Route::post('stripe',[StripePaymentController::class,'stripePost'])->name('stripe');
 

// Controller Base Route 
Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe','stripe');
    Route::post('stripe','stripePost')->name('stripe.post');
});