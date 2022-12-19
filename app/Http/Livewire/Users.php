<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $dataUser;

    public function render()
    {
        $this->dataUser = User::take(5)->get();
        // dd($this->dataUser);
        return view('livewire.users');
    }
}
