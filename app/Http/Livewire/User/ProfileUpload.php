<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class ProfileUpload extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    public $user,$profile,$photo;

    protected $rules = [
        'photo' => 'image',
    ];
    public function uploadProfilePhoto(){
        $validatedData = $this->validate();
        // dd($validatedData);

        $validatedData['profile_pics'] = $this->photo->store('users','public');
        if(Storage::exists('public/'.$this->user->profile_pics)){
            //   dd($service->picture);
            Storage::delete('public/'.$this->user->profile_pics);
        }
        $this->user->profile_pics = $validatedData['profile_pics'];
        $this->user->save();
        $this->alert('info', 'Profile picture updated successfully');
        $this->photo = '';
    }
    public function render()
    {
        return view('livewire.user.profile-upload');
    }
}
