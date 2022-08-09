<?php

namespace App\Http\Livewire\Auth;

use App\Models\MembershipClub;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Login extends Component
{
    use LivewireAlert;

    public $email, $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
       
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Login()
    {
        $validated = $this->validate();
        if (Auth::attempt(array('email' => $validated['email'], 'password' => $validated['password']))) {
            if (auth()->user()->type === 'admin') {
                return redirect(route('admin.dashboard'));
            } elseif (auth()->user()->type === 'manager') {

                return redirect(route('branch.details'));
            } else {
                return redirect(route('forum'));
            }
        } else {
            // dd(Hash::make('angelben'));
            $this->alert('warning', 'Incorrect email or password.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.dashmain');
    }
}
