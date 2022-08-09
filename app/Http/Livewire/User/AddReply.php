<?php

namespace App\Http\Livewire\User;

use App\Models\Reply;
use Livewire\Component;
use DeepCopy\Filter\ReplaceFilter;
use Illuminate\Support\Facades\Auth;

class AddReply extends Component
{
    public $comment,$post;

    protected $rules = [
        'comment' => 'required'
    ];

    public function mount(){
        
    }

    public function addComment()
    {
        $validatedData = $this->validate();

        $validatedData['post_id'] = $this->post->id;
        $validatedData['user_id'] = Auth::id();
        Reply::create($validatedData);
        $this->comment = '';
        return redirect(request()->header('Referer'));

    }
    public function render()
    {
        return view('livewire.user.add-reply');
    }
}
