<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Reply;
use Livewire\Component;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\Auth;

class ForumItem extends Component
{
    public $post,$uploader,$replies,$uploaderClub;

    public function mount()
    {
        $this->uploader = User::find($this->post->user_id);
        // dd($this->uploader->type);
        if($this->uploader->type == "manager"){
            // dd('here');
            $this->uploaderClub = MembershipClub::whereUserId($this->uploader->id)->first()->name;
        }

        $this->replies = Reply::wherePostId($this->post->id)->count();
    }
    public function render()
    {
        return view('livewire.user.forum-item');
    }
}
