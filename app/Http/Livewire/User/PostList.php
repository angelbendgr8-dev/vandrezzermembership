<?php

namespace App\Http\Livewire\User;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\Auth;

class PostList extends Component
{
    use WithPagination;
    public $club_id;

    public function mount(){
        if (Auth::user()->type === 'manager') {
            $this->club_id = MembershipClub::whereUserId(Auth::id())->select('id')->first()->id;
        }else if(Auth::user()->type === 'user'){
            $this->club_id = Auth::user()->club_id;
        }
        // dd($this->club_id);

    }
    public function getPost(){

            if (Auth::user()->type === 'manager') {
                return Post::where('audience','public')
                            ->orWhere('membership_club_id',$this->club_id)
                            ->latest()->paginate(25);
            }else if(Auth::user()->type === 'user'){
                return Post::where('audience','public')
                            ->orWhere('membership_club_id',$this->club_id)
                            ->latest()->paginate(25);
            }else{
                return Post::latest()->paginate(25);
            }


    }
    public function render()
    {
        return view('livewire.user.post-list',[
            'posts' => $this->getPost(),
        ]);
    }
}
