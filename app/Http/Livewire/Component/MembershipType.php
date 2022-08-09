<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class MembershipType extends Component
{
    public $name, $age_range ='-',$price='-',$total = 0,$count = 0;
    public function mount(){

    }
    public function render()
    {
        return view('livewire.component.membership-type');
    }
}
