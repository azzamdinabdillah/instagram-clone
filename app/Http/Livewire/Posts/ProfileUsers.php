<?php

namespace App\Http\Livewire\Posts;

use App\Models\User;
use App\Models\Posts;
use App\Models\Follow;
use App\Models\Comments;
use Livewire\Component;
use App\Models\LikePostUser;
use App\Models\FollowUsersDetails;
use Illuminate\Support\Facades\DB;

class ProfileUsers extends Component
{
    public $usernamePost;
    public $dataUser;
    public $dataUserPost;
    public $dataFollowers;

    public $dataFollowing;
    public $dataFollowing2;
    public $resultFollowing;

    public $checkFollowers;

    public $idPost = 0;
    public $dataComment;
    public $dataPost;
    public $comment;

    protected $listeners = [
        'addLikes' => 'Likes'
    ];

    public function mount($username)
    {
        $this->usernamePost = $username;
    }

    public function render()
    {
        $this->dataUser = User::where('username', $this->usernamePost)->get()[0];
        $this->dataUserPost = Posts::where('user_id', $this->dataUser->id)->get();

        $this->dataFollowers = Follow::where('followTo', $this->dataUser->id)->get();
        $this->dataFollowing = Follow::where('user_id', $this->dataUser->id)->get();

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
            'followTo' => $this->dataUser->id,
        ];

        $this->checkFollowers = Follow::where($data)->get();
        // dd($this->checkFollowers);

        // iki lek pengen ngerti data lengkap sopo ae followers e
        // foreach ($coba as $row) {
        //     dump($row->users->username);
        // }
        

        // dd($this->dataUserPost);

        $this->dataPost = Posts::find($this->idPost);

        $this->dataComment = Comments::where([
            'posts_id' => $this->idPost,
        ])->orderBy('id', 'desc')->get();

        return view('livewire.posts.profile-users');
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

    public function follow()
    {
        $data = [
            'user_id' => auth()->user()->id,
            'followTo' => $this->dataUser->id,
        ];

        $follow = Follow::where($data)->get();
        
        if ($this->checkFollowers->count() > 0) {
            DB::table('follows')->where($data)->delete();
        }else{
            Follow::create([
                'user_id' => auth()->user()->id,
                'followTo' => $this->dataUser->id,
            ]);
        }
    }

    public function followFollowers($id, $idUser)
    {
        // dd($id);
        // $user = Follow::find($id);
        // $data = $user->users->id;

        $dataFollowers = [
            'user_id' => auth()->user()->id,
            'followTo' => $idUser,
        ];

        $this->checkFollowers = Follow::where($dataFollowers)->get();

        $data = [
            'user_id' => auth()->user()->id,
            'follow_id' => $id,
        ];

        $checkFollowUsersDetails = FollowUsersDetails::where($data)->get();

        if ($this->checkFollowers->count() > 0 && $checkFollowUsersDetails->count() > 0) {
            DB::table('follow_users_details')->where($data)->delete();

            DB::table('follows')->where([
                'user_id' => auth()->user()->id,
                'followTo' => $idUser,
            ])->delete();

            DB::table('follows')->where([
                'user_id' => $idUser,
                'followTo' => auth()->user()->id,
            ])->delete();

        }else {
            FollowUsersDetails::create($data);
    
            Follow::create([
                'user_id' => auth()->user()->id,
                'followTo' => $idUser,
            ]);
    
            Follow::create([
                'user_id' => $idUser,
                'followTo' => auth()->user()->id,
            ]);
        }

    }

    public function ModalComment($id)
    {
        $this->idPost = $id;
        // dd($this->idPost);
        $this->dataPost = Posts::find($this->idPost);

        $this->dataComment = Comments::where([
            'posts_id' => $this->idPost,
        ])->orderBy('id', 'desc')->get();

        $this->comment = '';
    }

    public function addComment()
    {
        Comments::create([
            'comment' => $this->comment,
            'user_id' => auth()->user()->id,
            'posts_id' => $this->idPost,
        ]);
    }
}
