<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\MembershipClub;

class ReplyItem extends Component
{
    public $reply, $uploader, $uploaderClub;

    public function mount()
    {
        $this->uploader = User::find($this->reply->user_id);
        if ($this->uploader->type == "manager") {
            // dd('here');
            $this->uploaderClub = MembershipClub::whereUserId($this->uploader->id)->first()->name;
        }
    }
    public function render()
    {
        return view('livewire.user.reply-item');
    }
}
