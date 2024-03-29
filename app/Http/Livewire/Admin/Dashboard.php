<?php

namespace App\Http\Livewire\Admin;

use App\Models\MembershipClub;
use App\Exports\ManagerExport;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Dashboard extends Component
{
    use WithPagination;
    public $search;

    // protected $listeners = ['filter'];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $managers = MembershipClub::with('manager', 'members')->paginate(25);
    }
    public function export()
    {
        return Excel::download(new ManagerExport, 'managers.xlsx');
    }

    public function getManager()
    {
        if (!empty($this->search)) {
            return  MembershipClub::where('name', 'like', '%' . $this->search . '%')
                ->with('manager','members')
                ->paginate(25);
        } else {
            return  MembershipClub::with('manager', 'members')->paginate(25);
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard', [

            'managers' => $this->getManager(),

        ])->layout('layouts.dashmain');
    }
}
