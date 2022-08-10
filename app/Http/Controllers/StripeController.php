<?php

namespace App\Http\Controllers;

use Session;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\AgentActivation;
use App\Models\AgentPackages;
use App\Models\RequestActivation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{


        /**
     * The user repository instance.
     */
    protected $package;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */

    public function __construct(AgentPackages $package)
    {
        $this->package = $package;
    }

    public function getPaymentForm($id)
    {

        return view('stripe',['id'=>$id])->with(['id'=>$id]);
    }

    public function postPayment(Request $request)
    {
        $activated = RequestActivation::whereUserId(Auth::id())->first();
        $package = AgentPackages::find($activated->agent_package_id);
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => $package->price*100,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "Payment for Agent Activation",
        ]);
        $this->sendEmail();

        $activated->status = 'completed';
        $activated->save();
        $user = User::find(Auth::id());
        $user->status = 'pending';
        $user->save();
        // dd('success');
        Session::flash('success', 'Payment Successful !');
        return redirect(route('branch.update.details'));
        } catch (\Throwable $th) {
            dd($th);
            return redirect(route('branch.update.details'));
        }


        return back();
    }

    public function sendEmail()
    {
        $admin = User::whereType(1)->first()->email;

        $user = User::find(Auth::id())->with('club')->first();
        // dd($user->club);
        // dd
        $email = 'anglbendgr8@gmail.com';

        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the
         * receiver email address.
         *
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */
        // Mail::to($reveiverEmailAddress)->send(new ConfirmEmail($otp));
        try {
            //code...
            Mail::to($admin)->send(new AgentActivation($user));
        } catch (\Throwable $th) {
            // dd($th);
        }
    }
}

