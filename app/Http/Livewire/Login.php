<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $password;
    public $username;
    public $showPw = false;
    public $hidePw = true;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];
 
    public function render()
    {
        return view('livewire.login');
    }
    
    public function showPassword()
    {
        $this->showPw = true;
        $this->hidePw = false;
    }

    public function hidePassword()
    {
        $this->showPw = false;
        $this->hidePw = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function loginSystem()
    {
        $validatedData = $this->validate();

        // dd($validatedData);

        if (Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            session()->regenerate();

            return redirect()->intended('/');
        }

        return redirect()->back()->with('loginGagal', 'Maaf, Akun tidak dikenali')->onlyInput('username');
    }
}
