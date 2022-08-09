<?php

namespace App\Http\Livewire;

use App\Models\ClubExco;
use Livewire\Component;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\Auth;

class ExcoList extends Component
{
    public $excos,$manager;

    public function mount(){
        $club = MembershipClub::whereUserId(Auth::id())->first();
        $this->manager = Auth::user();
        $this->excos = ClubExco::whereMembershipClubId($club->id)->get();
    }
    public function render()
    {
        return view('livewire.exco-list')->layout('layouts.dashmain');
    }
}
