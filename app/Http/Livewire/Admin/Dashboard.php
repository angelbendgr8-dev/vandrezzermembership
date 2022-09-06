<?php

namespace App\Http\Livewire\Admin;

<<<<<<< Updated upstream
use App\Models\MembershipClub;
=======
use App\Exports\ManagerExport;
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    public function mount(){
        $managers = MembershipClub::with('manager','members')->paginate(25);

=======
    public function mount()
    {
        $managers = User::whereType(2)->with('club')->paginate(25);
        // dd($managers);
>>>>>>> Stashed changes
    }
    public function export()
    {
        return Excel::download(new ManagerExport, 'managers.xlsx');
    }

    public function getManager()
    {
<<<<<<< Updated upstream
        if(!empty($this->search)){
           return  MembershipClub::
                            where('name','like','%'.$this->search.'%')
                            ->with('manager','members')
                            ->paginate(25);
        }else{
            return  MembershipClub::with('manager','members')->paginate(25);
=======
        if (!empty($this->search)) {
            return  User::whereType(2)
                ->where('status', 'like', '%' . $this->search . '%')
                ->with('club')
                ->paginate(25);
        } else {
            return  User::whereType(2)->with('club')->paginate(25);
>>>>>>> Stashed changes
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard', [

            'managers' => $this->getManager(),

        ])->layout('layouts.dashmain');
    }
}
