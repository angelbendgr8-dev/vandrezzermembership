<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use App\Models\ClubExco;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddExco extends Component
{
    use LivewireAlert;
    public $club,$users,$profiles,$position,$user;


    protected $rules = [
        'position' => 'required',
        'user' => 'required',
    ];

    public function mount(){
        $this->club = MembershipClub::whereUserId(Auth::id())->first();
        $this->users = User::whereClubId($this->club->id)->get();
        // $this->profiles = Profile::whereMembershipClubId($this->club->id)->get();
    }
    public function addExco()
    {
        $validatedData = $this->validate();

        ClubExco::create([
            'user_id' => $validatedData['user'],
            'position' => $validatedData['position'],
            'membership_club_id' => $this->club->id,
        ]);
        $this->alert('info', 'Exco Added successfully');
        $this->position = '';
        return redirect(route('branch.excos'));
    }
    public function render()
    {
        return view('livewire.dashboard.add-exco')->layout('layouts.dashmain');
    }
}
