<?php

namespace App\Http\Controllers\StripeV1;

use URL;
use Input;
use Session;
// use Stripe;
// use Validator;
use Validator;
use Stripe\Error\Card;
use Illuminate\Support\Arr;
// use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StripeCardRequest;
use Illuminate\Support\Facades\Redirect;


class StripePaymentControllerV1 extends Controller
{
    public function stripe()
    {
        return view('stripeV1');
    }
    public function stripePost(StripeCardRequest $req)
    {
        // $validator = $req->validated();
        $input = $req->all();
        // $input = Arr::except($input,array('_token'));
        // dd($input);
        $validator = Validator::make($input,[
            'card_no' => 'required',
            'ccExpiryMonth' =>'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            'amount' => 'required'
        ]);
        
        if($validator->passes())
        {
            $input = Arr::except($input,array('_token'));
            $stripe = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            dd($stripe);
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $req->get('card_no'),
                        'exp_month' => $req->get('ccExpiryMonth'),
                        'exp_year' => $req->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ]
                ]);
            if(!isset($token['id']))
                return redirect()->route('stripe-v1');
            
            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'USD',
                'amount' =>20.49,
                'description' => 'This is stripe Version 1.0',
            ]);

            if($charge['status'] == 'succeeded')
            {
                echo "<pre>";
                print_r ($charge); exit();
                return redirect()->route('stripe-v1');
            }
            else {
                \Session::put('error','Money not add in Wallet!!');
                return redirect()->route('stripe-v1');
                }
            }
            catch(\Cartalyst\Stripe\Exception\CardErrorException $e)
            {
                \Session::put('error',$e->getMessage());
                return redirect()->route('stripe-v1');
            }
        }
    }
}
