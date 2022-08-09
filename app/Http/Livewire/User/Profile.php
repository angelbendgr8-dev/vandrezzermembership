<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile as UserProfile;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $user,$photo,$display_name;

    protected $rules = [
        'user.firstname' => 'required|string',
        'user.lastname' => 'required|string',
        'user.email' => 'string',
        'user.display_name' => 'string|required',
    ];

    public function mount(){
        $this->user = User::find(Auth::id());
       
    }
    public function updateProfile(){
        $validatedData = $this->validate();
        // $this->user->save();

        $this->user->display_name = $this->display_name;
        $this->user->save();
        $this->alert('info', 'Profile information updated successfully');
    }
    public function render()
    {
        return view('livewire.user.profile')->layout('layouts.dashmain');
    }
}
