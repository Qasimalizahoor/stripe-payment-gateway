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
        // creating customer details
        $customer = Stripe\Customer::create(array(
            "address" => [
                'line1' => "Haripur",
                'postal_code' => "22620",
                "city"=> "Haripur",
                "state" => "KPK",
                "country" => "PK"
            ],
            "email" => "qasim3288@gmail.com",
            "name" => "Qasim Ali Zahoor",
            "source" => $req->stripeToken
        ));

        Stripe\Charge::create ([
            'amount' =>  $req->amount * 100,
            'currency' => "usd",
            'customer' =>$customer->id,
            'description' =>"Test Payment by Qasim Ali",
            'shipping' =>[
                "name" => "Shoaib Khan",
                "address" => [
                    'line1' => "1-H22",
                    'postal_code' => "22242",
                    "city"=> "Naga Saki",
                    "state" => "ZYX",
                    "country" => "Japan"
                ]
            ]

        ]);

        // If You dont need customer details then just add this
        
        // Stripe\Charge::create([
        //     "amount" => 100* 100,
        //     "currency"=> "usd",
        //     "source"=>$req->StripeToken,
        //     'description'=>"Test payment here"
        // ]);
        Session::flash('success','Payment Successfuly');
        return back();
    }
}
