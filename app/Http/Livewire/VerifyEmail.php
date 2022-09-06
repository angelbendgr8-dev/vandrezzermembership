<?php

namespace App\Http\Livewire;

use App\Models\OtpCode;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class VerifyEmail extends Component
{
    use LivewireAlert;
    public $otp_code;

    protected $rules = [
        'otp_code' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function verifyEmail()
    {
        $validatedData = $this->validate();
        $value = request()->session()->get('reset_email');
        $code = OtpCode::whereEmail($value)->first();
        // dd($code);
        // return  $this->sendResponse($code->code, 'Email verified Successfully');
        if ($code  && $code->code === $this->otp_code) {
            return redirect(route('change.password'));
        } else {
            $this->alert('warning', 'Invalid otp supplied');
            return;
        }
    }
    public function render()
    {
        return view('livewire.verify-email')->layout('layouts.dashmain');
    }
}
