<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use App\Mail\UserRegistration;
use App\Models\MembershipClub;
use App\Mail\ManagerCongratulation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Register extends Component
{
    public $club;
    use LivewireAlert;

    public $firstname, $lastname, $email, $password,$mobile_number, $password_confirmation;

    protected $rules = [
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|unique:users',
        'mobile_number' => 'required|unique:users',
        'password' => 'required|confirmed',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function joinClub()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        $validatedData['type'] = 0;
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['club_id'] = $this->club->id;
        $validatedData['status']  = 'active';
        User::create($validatedData);
        // $user = User::whereEmail($this->email)->first();
        $club = MembershipClub::whereUserId($this->club->id)->with('manager','members')->first();
        $this->sendRegistrationEmail();
        if(count($club->members) === 10 || count($club->members) === 50 || count($club->members) === 100 ){
            $this->sendCongratulationEmail(count($club->members));
        }
        $this->alert('info', 'Account created successfully');
        return redirect(route('branch.login'));
    }
    public function mount($slug){
        $this->club = MembershipClub::whereSlug($slug)->first();
    }
    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.dashmain');
    }
    public function sendCongratulationEmail($number) {
        $recipient = User::whereType($this->club->user_id)->first()->email;

        // $user = User::find(Auth::id())->with('club')->first();
        // dd($user->club);
        // dd
        $user = User::whereEmail($this->email)->first();

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
            Mail::to($recipient)->send(new ManagerCongratulation($number));

        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function sendEmail() {
        $recipient = User::whereType($this->club->user_id)->first()->email;

        // $user = User::find(Auth::id())->with('club')->first();
        // dd($user->club);
        // dd
        $user = User::whereEmail($this->email)->first();

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
            Mail::to($recipient)->send(new UserRegistration($user));

        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
