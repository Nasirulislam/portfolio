<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangePassword extends Component
{
    public $currentPassword;
    public $password; //new password
    public $password_confirmation;

    protected $rules = [
        'currentPassword'=>['required','min:6'],
        'password'=>['required','min:6','confirmed']
    ];

    public function updatePassword()
    {
        $this->validate($this->rules);

        if(strtolower($this->password) == strtolower($this->currentPassword))
        {
            return back()->with("message","New password should'nt match with previous password");
        }

        $user = auth()->user();

        return $user->update([
            'password' => bcrypt("$this->password")
        ])
        ? back()->with('success','Password Updated Sucessfully')
        : back()->with('error','Bad Request');
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
