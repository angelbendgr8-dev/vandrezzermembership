<?php

namespace App\Http\Livewire\Admin;

use App\Models\AgentPackages;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CreatePackage extends Component
{
    use LivewireAlert;
    public $name, $price,$locale= 'local';
    protected $rules = [
        'name' => 'required',
        'price' => 'required',
        'locale' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPackage(){
        // dd('here');
        $validatedData = $this->validate();
        // dd($validatedData);
        AgentPackages::create($validatedData);

        return redirect(route('admin.viewpackages'));
    }
    public function render()
    {
        return view('livewire.admin.create-package')->layout('layouts.dashmain');
    }
}
