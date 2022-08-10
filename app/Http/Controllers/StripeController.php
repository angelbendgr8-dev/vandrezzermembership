<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Session;

class StripeController extends Controller
{


    public function getPaymentForm($id)
    {
        // dd($id);/
        return view('stripe');
    }

    public function postPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => 100*100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "This is test payment",
        ]);
        dd('success');
        Session::flash('success', 'Payment Successful !');

        return back();
    }
}
