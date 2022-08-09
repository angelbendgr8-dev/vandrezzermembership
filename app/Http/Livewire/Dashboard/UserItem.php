<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class UserItem extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.dashboard.user-item');
    }
}
