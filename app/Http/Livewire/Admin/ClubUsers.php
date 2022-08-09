<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\MembershipClub;

class ClubUsers extends Component
{

    public $club;
    public function mount($id){
        $this->club = MembershipClub::whereUserId($id)->first();
        // dd($club->id);

        // dd($this->users);

    }
    public function getUsers()
    {
        if($this->club){

            return User::whereClubId($this->club->id)->paginate(25);

        }else{
            return [];
        }
    }
    public function render()
    {
        return view('livewire.admin.club-users',[
            'users' => $this->getUsers(),
        ])->layout('layouts.dashmain');
    }
}
