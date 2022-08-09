<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use App\Models\ClubExco;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\Auth;

class ExcoList extends Component
{
    public $excos,$manager;

    public function mount()
    {
        $user = Auth::user();
        $club = MembershipClub::find(Auth::user()->club_id);
        $this->manager = User::find($club->user_id);
        $this->excos = ClubExco::whereMembershipClubId($user->club_id)->get();

    }
    public function render()
    {
        return view('livewire.user.exco-list')->layout('layouts.dashmain');
    }
}
