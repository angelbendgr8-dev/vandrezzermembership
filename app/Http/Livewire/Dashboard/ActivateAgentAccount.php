<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Livewire\Component;
use Stripe\Checkout\Session;
use App\Mail\AgentActivation;
use App\Models\AgentPackages;
use App\Models\MembershipClub;
use Illuminate\Http\Client\Pool;
use App\Models\RequestActivation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ActivateAgentAccount extends Component
{
    use LivewireAlert;
    public $name, $branch, $price, $locale, $packages, $package;
    protected $rules = [
        'package' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {

        $this->branch = MembershipClub::whereUserId(Auth::id())->first();
        $ip = request()->ip(); //Dynamic IP address get
        //  dd($ip);
        $position = \Location::get($ip);
        //  dd($position);
        // if (!$position) {
        //     $this->packages = AgentPackages::whereLocale('foreign')->get();
        // }
        if($position->countryName === 'Nigeria'){
            $this->packages = AgentPackages::whereLocale('foreign')->get();
        }else{
            $this->packages = AgentPackages::whereLocale('local')->get();
            // $this->packages = AgentPackages::whereLocale('local')->get();
            // dd($this->packages);
        }
    }
    public function Activate()
    {
        // dd('here');
        $validated = $this->validate();
        $selected = $this->package;
        // dd($selected);
        $choosen = array_values(array_filter($this->packages->toArray(), function ($item) use ($selected) {
            return $item['id'] == $selected;
        }));
        // dd($choosen[0]);
        if ($choosen[0]['locale'] === 'local') {
            $this->payWithFlutter($choosen);
        } else {
            // dd('here');
            $this->payWithWorldPay($choosen);
        }
    }
    public function payWithFlutter($choosen)
    {
        try {

            $response = Http::withHeaders([
                'Authorization' => 'Bearer FLWSECK_TEST-d7eecc595c1f8a5c3a8ab17ee5dda128-X',
            ])->post('https://api.flutterwave.com/v3/payments', [
                'tx_ref' => Carbon::now(),
                'amount' => $choosen[0]['price'],
                'currency' => "NGN",
                'redirect_url' => route('branch.update.details'),
                'meta' => [
                    'consumer_id' => Auth::id(),
                    'consumer_mac' => "92a3-912ba-1192a"
                ],
                'customer' => [
                    'email' => Auth::user()->email,
                    'phonenumber' => Auth::user()->mobile_number,
                    'name' => $this->branch->name,
                ],
            ]);

            if ($response['status'] === 'success') {
                $request = new RequestActivation();
                $request->user_id = Auth::id();
                $request->agent_package_id = $choosen[0]['id'];
                $request->save();

                return redirect()->away($response['data']['link']);
            }
        } catch (\Throwable $th) {
            //    dd($th);
        }
    }

    public function payWithWorldPay($choosen)
    {

        $activated = RequestActivation::whereUserId(Auth::id())->first();
        // dd($activated);
        if ($activated) {
            $activated->delete();
        }
            $request = new RequestActivation();
            $request->user_id = Auth::id();
            $request->agent_package_id = $choosen[0]['id'];
            $request->save();
            $this->alert('success', 'Request sent successfully.');

        // dd('stripe');
        // dd($choosen[0]['id']);
        return redirect(route('stripe.payment',$choosen[0]['id']));
        // try {


        //     return back();
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
    }
    public function render()
    {
        return view('livewire.dashboard.activate-agent-account')->layout('layouts.dashmain');
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
