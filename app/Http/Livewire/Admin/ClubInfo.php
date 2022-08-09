<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\ClubExco;
use App\Mail\AgentActivated;
use App\Mail\AgentDeactivated;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\Mail;

class ClubInfo extends Component
{
    public $club,$excos,$manager;
    // protected $listeners = ['changeStatus'];
    public function mount($id){
        $this->club = MembershipClub::whereUserId($id)->first();


        $this->manager = User::find($this->club->user_id);
        $this->excos = ClubExco::whereMembershipClubId($this->club->id)->get();
        // dd($thisp->club);
    }
    public function changeStatus()
    {

        // dd($id);

        // $user->status = $user->status === 'active'? 'inactive':'active';
        if($this->manager->status === 'active'){
           $user= User::find($this->manager->id);
           $user->status = 'inactive';
           $user->save();
           $this->sendDeactivationEmail();

        }else{
            $user= User::find($this->manager->id);
            $user->status = 'active';
            $user->save();
            $this->sendActivationEmail();


        }
        // dd($this->manager);

       
        // return redirect(route('admin.dashboard'));
    }
    public function render()
    {
        return view('livewire.admin.club-info')->layout('layouts.dashmain');
    }
    public function sendActivationEmail() {
        $admin = User::whereType(1)->first()->email;


        // dd($user->club);
        // dd
        $email = $this->manager->email;

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
            Mail::to($email)->send(new AgentActivated());

        } catch (\Throwable $th) {
            // dd($th);
        }
    }
    public function sendDeactivationEmail() {
        $admin = User::whereType(1)->first()->email;


        // dd($user->club);
        // dd
        $email = $this->manager->email;

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
            Mail::to($email)->send(new AgentDeactivated());

        } catch (\Throwable $th) {
            // dd($th);
        }
    }
}
