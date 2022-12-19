<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\User;
use Livewire\Component;
use App\Models\LikePostUser;
use Illuminate\Support\Facades\DB;
use App\Models\Posts as ModelsPosts;

class Posts extends Component
{
    public $allDataPost;
    public $allDataUser;
    public $limitPost = 10;

    public $moreDescs = false;
    public $like;

    // untuk modal comment
    public $idPost = 0;
    public $totalComment;
    public $dataPost;
    public $dataComment;

    public $comment;

    protected $listeners = [
        'post-data' => 'plusLimitData',
        'modalComment' => 'ModalComment',
        'addLikes' => 'Likes'
    ];

    public function plusLimitData()
    {
        $this->limitPost = $this->limitPost + 5;
    }

    // method untuk menerima id dari tombol modal comment
    public function ModalComment($id)
    {
        $this->idPost = $id;
        // dd($this->idPost);
        $this->dataPost = ModelsPosts::find($this->idPost);

        $this->dataComment = Comments::where([
            'posts_id' => $this->idPost,
        ])->orderBy('id', 'desc')->get();

        $this->comment = '';

    }

    public function render()
    {
        // $this->allDataPost = ModelsPosts::latest()->orderBy('id', 'desc')->paginate($this->limitPost);
        $this->allDataPost = ModelsPosts::take($this->limitPost)->get();
        // dd($this->allDataPost);

        $this->dataPost = ModelsPosts::find($this->idPost);

        $this->dataComment = Comments::where([
            'posts_id' => $this->idPost,
        ])->orderBy('id', 'desc')->get();

        // $this->totalComment = $this->dataComment->count();
        // dd($this->totalComment);

        return view('livewire.posts');
    }

    public function moreDesc($likes)
    {
        // $data = DB::table('posts')->where('likes', '=', $likes)->limit(1)->get();
        // $data = ModelsPosts::where('likes', $likes)->latest()->paginate(1)->items();
        // dd($data);
        // if ($data) {
        //     $this->moreDescs = true;
        // }
        $this->moreDescs = true;
    }

    public function Likes($id)
    {
        // $this->like = LikePostUser::where('user_id', auth()->user()->id)->get();

        $data = [
            'posts_id' => $id,
            'user_id' => auth()->user()->id,
        ];

        $like = LikePostUser::where($data);

        if ($like->count() > 0) {
            $like->delete();
        }else{
            LikePostUser::create($data);
        }
        
        $this-> idPost = 0;
    }

    public function addComment()
    {
        Comments::create([
            'comment' => $this->comment,
            'user_id' => auth()->user()->id,
            'posts_id' => $this->idPost,
        ]);
    }

    public function likeImage($id)
    {
        $this->Likes($id);
    }

}
