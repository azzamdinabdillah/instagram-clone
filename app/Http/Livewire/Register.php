<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $password;
    public $email;
    public $name;
    public $username;

    public $showPw = false;
    public $hidePw = true;

    protected $rules = [
        'email' => 'required|email',
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.register');
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

    public function registerSystem()
    {
        $validatedData = $this->validate();

        $hashPw = bcrypt($validatedData['password']);
 
        $register = User::create([
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => $hashPw,
            'image' => '/img/avatar-1.jpg',
        ]);

        if ($register) {
            return redirect()->to('/login');
        }else{
            return redirect()->back();
        }

    }
}
