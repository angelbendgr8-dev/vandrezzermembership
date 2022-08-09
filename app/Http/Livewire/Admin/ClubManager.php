<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Mail\AgentActivated;
use Illuminate\Support\Facades\Mail;

class ClubManager extends Component
{
    public $manager;

    protected $listeners = ['changeStatus'];
   
    public function render()
    {
        return view('livewire.admin.club-manager');
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
            Mail::to($email)->send(new AgentActivated());

        } catch (\Throwable $th) {
            // dd($th);
        }
    }
}
