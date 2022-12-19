<?php

namespace App\Http\Livewire\Status;

use App\Models\User;
use Livewire\Component;

class Story extends Component
{
    public $allDataUser;

    public function render()
    {
        $this->allDataUser = User::take(20)->get();
        return view('livewire.status.story');
    }
}
