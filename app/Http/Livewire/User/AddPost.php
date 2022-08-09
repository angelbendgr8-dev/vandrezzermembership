<?php

namespace App\Http\Livewire\User;

use App\Models\MembershipClub;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AddPost extends Component
{
    use WithFileUploads;
    public $title,$content,$photo,$audience='public';
    public $club_id;
    // public $post=[];
    protected $rules = [
        'title' => 'required|string',
        'content' => 'required',
    ];
    public function mount(){
        if (Auth::user()->type === 'manager') {
            $this->club_id = MembershipClub::whereUserId(Auth::id())->select('id')->first()->id;
        }else if(Auth::user()->type === 'user'){
            $this->club_id = Auth::user()->club_id;
        }

    }
    public function addNewPost()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        if($this->photo){
            $this->validate([

                'photo' => 'image', // 1MB Max

            ]);
            $validatedData['image'] = $this->photo->store('posts','public');
        }
        // dd($this->image);
        $validatedData['user_id'] = Auth::id();
        $validatedData['membership_club_id'] = $this->club_id;
        $validatedData['audience'] = $this->audience;

        Post::create($validatedData);
        return redirect(route('forum'));
    }
    public function render()
    {
        return view('livewire.user.add-post')->layout('layouts.dashmain');
    }
}
