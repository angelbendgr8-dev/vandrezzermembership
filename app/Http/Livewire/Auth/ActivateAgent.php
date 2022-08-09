<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ActivateAgent extends Component
{
    use LivewireAlert;

    public $firstname, $lastname, $email, $password, $password_confirmation,$countries,$club_mobile,$country,$name;

    protected $rules = [
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|unique:users',
        'club_mobile' => 'required|unique:membership_clubs',
        'name'=> 'required|unique:membership_clubs',
        'country' => 'required',
        'password' => 'required|confirmed',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount(){
        $this->countries = DB::table('countries')->pluck('name');
    }
    public function submitAgentInfo()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        $validatedData['type'] = 2;
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $this->alert('info', 'Membership branch created successfully. please proceed to login to access your account', [
            'toast' => false,
            'position' => 'center',
        ]);
        $user = User::whereEmail($this->email)->first();
        $club = new MembershipClub();
        $club->name = $validatedData['name'];
        $club->user_id = $user->id;
        $club->club_email = $this->email;
        $club->club_mobile = $validatedData['club_mobile'];
        $club->country = $validatedData['country'];

        $club->save();
        $this->firstname = '';
        $this->lastname = '';
        return redirect(route('branch.login'));
    }

    public function render()
    {
        return view('livewire.auth.activate-agent')->layout('layouts.dashmain');
    }
}
