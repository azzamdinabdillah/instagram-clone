<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Posts;
use App\Models\Follow;
use Livewire\Component;
use App\Models\LikePostUser;

class Profile extends Component
{
    public $dataMyPost;
    public $dataFollowers;
    public $dataFollowing;
    public $dataFollowing2;
    public $checkFollowers;
    public $resultFollowing;
    // public $dataUser;

    public $listeners = [
        'addLikes' => 'Likes',
    ];

    public function render()
    {
        $this->dataMyPost = Posts::where('user_id', auth()->user()->id)->get();

        $this->dataFollowers = Follow::where('followTo', auth()->user()->id)->get();
        $this->dataFollowing = Follow::where('user_id', auth()->user()->id)->get();
        // dd($this->dataMyPost);

        // $this->dataFollowers = Follow::where('followTo', $this->dataUser->id)->get();
        // $this->dataFollowing = Follow::where('user_id', $this->dataUser->id)->get();

        $array = [];

        foreach ($this->dataFollowing as $row) {
            $coba = $row->followTo;
            // dump(User::where('id', $coba)->get());
            $this->dataFollowing2 = User::where('id', $coba)->get()[0];
            $array[] = $this->dataFollowing2;

            $this->resultFollowing = $array;
        }

        $data = [
            'user_id' => auth()->user()->id,
            'followTo' => auth()->user()->id,
        ];

        $this->checkFollowers = Follow::where($data)->get();

        return view('livewire.profile');
    }

    public function Likes($id)
    {
        // $this->like = LikePostUser::where('user_id', auth()->user()->id)->get();

        $data = [
            'posts_id' => $id,
            'user_id' => auth()->user()->id,
        ];

        $like = LikePostUser::where($data);
        // dd($like);

        if ($like->count() > 0) {
            $like->delete();
        }else{
            LikePostUser::create($data);
        }
    }
}
