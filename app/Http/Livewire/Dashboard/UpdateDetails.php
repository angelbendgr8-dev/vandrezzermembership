<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Mail\AgentActivation;
use App\Models\MembershipClub;
use App\Models\RequestActivation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class UpdateDetails extends Component
{
    use LivewireAlert;
    public $countries, $club, $club_website, $club_facebook_link, $club_instagram_link,
        $club_twitter_link, $club_venue, $club_zip_code, $club_language, $number_of_supporters, $last_supporter_joined_date,
        $ticket_contact_name, $ticket_contact_number, $ticket_contact_email, $ticket_address, $club_members;
    protected $rules = [
        'club.name' => 'required',
        'club.country' => 'required|string',
        'club.club_email' => 'required|email',
        'club.club_mobile' => 'required|string',
    ];
    public function mount($status = '', $tx_ref = '', $transaction_id = '')
    {
        // $worldpay = new Worldpay('your-test-service-key');
        $status = request()->query('status');
        if($status){

            $this->checkPayment($status);
        }else{
            $activated = RequestActivation::whereUserId(Auth::id())->first();
            if($activated && $activated->status === 'pending'){
                $this->alert('success', 'Information updated successfully.');
                $activated->delete();
            }else if($activated && $activated->status === 'completed'){
                session()->flash('message', 'Payment successful, your Activation request has been sent to the admin.');
                $activated->delete();
            }else{
                
            }
        }

        $this->countries = DB::table('countries')->pluck('name');
        $this->club = MembershipClub::whereUserId(Auth::id())->first();
        $this->club_website = $this->club->club_website;
        $this->club_facebook_link = $this->club->club_facebook_link;
        $this->club_instagram_link = $this->club->club_instagram_link;
        $this->club_twitter_link = $this->club->club_twitter_link;
        $this->club_venue = $this->club->club_venue;
        $this->club_zip_code = $this->club->club_zip_code;
        $this->club_language = $this->club->club_language;
        $this->last_supporter_joined_date = User::whereClubId($this->club->id)->latest()->first()->created_at ?? null;
        $this->ticket_contact_name = $this->club->ticket_contact_name;
        $this->number_of_supporters = User::whereClubId($this->club->id)->count();
        $this->ticket_contact_number = $this->club->ticket_contact_number;
        $this->ticket_contact_email = $this->club->ticket_contact_email;
        $this->ticket_address = $this->club->ticket_address;
    }

    public function Activate()
    {
        $activated = RequestActivation::whereUserId(Auth::id())->first();
        // dd($activated);
        if (!$activated) {
            $request = new RequestActivation();
            $request->user_id = Auth::id();
            $request->save();
            $this->alert('success', 'Request sent successfully.');
        }
    }
    public function  checkPayment($status)
    {
        if ($status === 'successful') {

            session()->flash('message', 'Payment successful, your Activation request has been sent to the admin.');
            $this->sendEmail();
            $user = User::find(Auth::id());
            $user->status = 'pending';
            $user->save();
        } else {
            // dd('here');
            session()->flash('warning', 'Payment '.$status.'.');
        }
    }
    public function updateClubInfo()
    {
        $validatedData = $this->validate();
        $this->club->club_website = $this->club_website;
        $this->club->club_facebook_link = $this->club_facebook_link;
        $this->club->club_instagram_link = $this->club_instagram_link;
        $this->club->club_twitter_link = $this->club_twitter_link;
        $this->club->club_venue = $this->club_venue;
        $this->club->club_zip_code = $this->club_zip_code;
        $this->club->club_language = $this->club_language;
        $this->club->last_supporter_joined_date = $this->last_supporter_joined_date;
        $this->club->ticket_contact_name = $this->ticket_contact_name;
        $this->club->ticket_contact_number = $this->ticket_contact_number;
        $this->club->ticket_contact_email = $this->ticket_contact_email;
        $this->club->ticket_address = $this->ticket_address;

        $this->club->save();
        $this->alert('success', 'Information updated successfully.');
    }
    public function render()
    {
        return view('livewire.dashboard.update-details')->layout('layouts.dashmain');
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
