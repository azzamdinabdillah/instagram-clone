<?php

namespace App\Http\Livewire\Posts;

use App\Models\User;
use App\Models\Follow;
use Livewire\Component;

class ProfileUsersFollowings extends Component
{
    public $dataUser;
    public $usernamePost;
    public $dataFollowing;
    public $dataFollowing2;
    public $resultFollowing;

    public function mount($username)
    {
        $this->usernamePost = $username;
    }

    public function render()
    {
        $this->dataUser = User::where('username', $this->usernamePost)->get()[0];
        $this->dataFollowers = Follow::where('followTo', $this->dataUser->id)->get();
        // dd($this->dataFollowers);

        $this->dataFollowing = Follow::where('user_id', $this->dataUser->id)->get();

        $array = [];

        foreach ($this->dataFollowing as $row) {
            $coba = $row->followTo;
            // dump(User::where('id', $coba)->get());
            $this->dataFollowing2 = User::where('id', $coba)->get()[0];
            $array[] = $this->dataFollowing2;

            $this->resultFollowing = $array;
        }

        return view('livewire.posts.profile-users-followings');
    }
}
