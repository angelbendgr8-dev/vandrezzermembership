<?php

namespace App\Http\Livewire\User;

use App\Models\Post;
use App\Models\User;
use App\Models\Reply;
use Livewire\Component;
use App\Models\MembershipClub;

class ViewPost extends Component
{
    public $post,$uploader,$replies_count,$uploaderClub;
    public function mount($id){
        $this->post = Post::find($id);
        $this->uploader = User::whereId($this->post->user_id)->first();
        

        $this->replies_count = Reply::wherePostId($this->post->id)->count();
        // dd($this->uploader);
    }
    public function render()
    {
        return view('livewire.user.view-post',[
            'replies' => Reply::wherePostId($this->post->id)->latest()->paginate(25),
        ])->layout('layouts.dashmain');
    }
}
