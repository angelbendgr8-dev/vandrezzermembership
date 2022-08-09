<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CheckList extends Component
{
    use WithPagination;
    public $club;
    public $search;

    // protected $listeners = ['filter'];
    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function getUser()
    {
        if(!empty($this->search)){
           return  User::whereClubId($this->club->id)
                            ->where('email','like','%'.$this->search.'%')
                            ->orWhere('display_name','like','%'.$this->search.'%')->paginate(25);
        }else{
            return User::whereClubId($this->club->id)->paginate(25);
        }
    }


    public function mount(){
        $this->club = MembershipClub::whereUserId(Auth::id())->first();
        // $this->users =
        // dd($this->users);
    }
    public function render()
    {
        return view('livewire.dashboard.check-list',[
            'users' => $this->getUser(),
        ])->layout('layouts.dashmain');
    }
}
