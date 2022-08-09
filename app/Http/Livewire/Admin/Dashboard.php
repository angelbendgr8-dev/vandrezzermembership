<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $search;

    // protected $listeners = ['filter'];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $managers = User::whereType(2)->with('club')->paginate(25);
        // dd($managers);
    }
    public function getManager()
    {
        if(!empty($this->search)){
           return  User::whereType(2)
                            ->where('status','like','%'.$this->search.'%')
                            ->with('club')
                            ->paginate(25);
        }else{
            return  User::whereType(2)->with('club')->paginate(25);
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard',[

            'managers' => $this->getManager(),

        ])->layout('layouts.dashmain');
    }
}
