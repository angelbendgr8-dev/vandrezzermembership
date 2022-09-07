<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $password,$password_confirmation,$showPassword;

    protected $rules = [
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changePassword()
    {
        $validatedData = $this->validate();
        $value = request()->session()->get('reset_email');
        $user = User::whereEmail($value)->first();
        $user->password = Hash::make($this->password);
        $user->save();
        return redirect(route('branch.login'));
    }
    public function render()
    {
        return view('livewire.change-password')->layout('layouts.dashmain');
    }
}

