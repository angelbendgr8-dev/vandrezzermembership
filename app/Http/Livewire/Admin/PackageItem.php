<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class PackageItem extends Component
{
    public $package;

    public function deletePackage(){
        $this->package->delete();
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.admin.package-item');
    }
}
