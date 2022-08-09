<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Models\MembershipClub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BranchDetails extends Component
{
    public $countries,$country;
    public $name,$slug,$club_email,$club_mobile,$club_website,$club_facebook_link,$club_instagram_link,
    $club_twitter_link,$club_venue,$club_zip_code,$club_language,$number_of_supporters,$last_supporter_joined_date,
    $ticket_contact_name,$ticket_contact_number,$ticket_contact_email, $ticket_address;

    protected $rules = [
        'name' => 'required|unique:membership_clubs',
        'country' => 'required|string',
        'club_email' => 'required|unique:membership_clubs',
        'club_mobile' => 'required|unique:membership_clubs',
    ];

    public function createClub(){
        $validatedData = $this->validate();
        $validatedData['user_id'] = Auth::id();
        $validatedData['club_website'] = $this->club_website;
        $validatedData['club_facebook_link'] = $this->club_facebook_link;
        $validatedData['club_twitter_link'] = $this->club_twitter_link;
        $validatedData['club_instagram_link'] = $this->club_instagram_link;
        $validatedData['club_venue'] = $this->club_venue;
        $validatedData['club_zip_code'] = $this->club_zip_code;
        $validatedData['club_language'] = $this->club_language;
        $validatedData['last_supporter_joined_date'] = $this->last_supporter_joined_date;
        $validatedData['ticket_contact_name'] = $this->ticket_contact_name;
        $validatedData['ticket_contact_email'] = $this->ticket_contact_email;
        $validatedData['ticket_contact_number'] = $this->ticket_contact_number;
        $validatedData['ticket_address'] = $this->ticket_address;
        $club = MembershipClub::create($validatedData);
        return redirect(route('branch.update.details'));
    }
    public function mount(){
      
        $this->countries = DB::table('countries')->pluck('name');
        $club = MembershipClub::whereUserId(Auth::id())->first();
        if($club){
            // $this->number_of_supporters = User::whereClubId($club->id)->count();
            return redirect(route('branch.update.details'));
        }
    }
    public function render()
    {
        return view('livewire.dashboard.branch-details')->layout('layouts.dashmain');
    }
}
