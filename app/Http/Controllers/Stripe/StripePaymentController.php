<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $req)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100* 100,
            "currency"=> "usd",
            "source"=>$req->StripeToken,
            'description'=>"Test payment here"
        ]);
        Session::flash('success','Payment Successfuly');
        return back();
    }
}
