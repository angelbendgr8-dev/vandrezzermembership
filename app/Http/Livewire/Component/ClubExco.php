<?php

namespace App\Http\Livewire\Component;

use App\Models\User;
use Livewire\Component;

class ClubExco extends Component
{
    public $exco,$profile;
    public function mount(){
        $this->profile = User::whereId($this->exco->user_id)->first();
    }

    public function deleteExco(){
        $this->exco->delete();
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.component.club-exco');
    }
}
