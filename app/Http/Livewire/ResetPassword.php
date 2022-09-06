<?php

namespace App\Http\Livewire;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Models\OtpCode;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ResetPassword extends Component
{
    use LivewireAlert;
    public $email;

    protected $rules = [
        'email' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function ResetPassword(Request $request)
    {
        $email = User::whereEmail($this->email)->first();
        // dd($email);
        if(!$email){
            $this->alert('warning', 'User with email does not exist.');
            return;
        }
        // return Str::random(5);
        /**
         * Store a receiver email address to a variable.
         */
        $reveiverEmailAddress = $this->email;

        // generate otp code for user to use


        $code = random_int(10000, 99999);

        $otp = new OtpCode();
        $otp->code = $code;
        $otp->email = $email->email;

        $otp->save();

        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the
         * receiver email address.
         *
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */

        try {
            //code...
            Mail::to($reveiverEmailAddress)->send(new ResetPasswordMail($otp));
            $this->alert('success', 'Reset Code has been sent to your email');
            request()->session()->put('reset_email',$email->email);
            return redirect(route('verify.email'));
        } catch (\Throwable $th) {
            dd($th);
        }



        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
    }
    public function render()
    {
        return view('livewire.reset-password')->layout('layouts.dashmain');
    }
}
