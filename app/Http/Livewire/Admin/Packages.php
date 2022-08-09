<?php

namespace App\Http\Livewire\Admin;

use App\Models\AgentPackages;
use Livewire\Component;

class Packages extends Component
{
    public $packages= [];
    public function mount(){
        $this->packages = AgentPackages::all();
    }
    public function render()
    {
        return view('livewire.admin.packages')->layout('layouts.dashmain');
    }
}
