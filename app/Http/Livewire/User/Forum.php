<?php

namespace App\Http\Livewire\User;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Forum extends Component
{

    public function render()
    {
        return view('livewire.user.forum')->layout('layouts.dashmain');
    }
}
