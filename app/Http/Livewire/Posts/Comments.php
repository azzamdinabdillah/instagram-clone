<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comments as ModelsComments;
use App\Models\Posts;
use Livewire\Component;

class Comments extends Component
{   
    public $idPost;
    public $dataPost;
    public $dataComment;
    public $comment;

    public function mount($id)
    {
        $this->idPost = $id;
    }

    public function render()
    {
        $this->dataPost = Posts::find($this->idPost);

        $this->dataComment = ModelsComments::where([
            'posts_id' => $this->idPost,
        ])->orderBy('id', 'desc')->get();

        return view('livewire.posts.comments');
    }

    public function addComment()
    {
        ModelsComments::create([
            'comment' => $this->comment,
            'user_id' => auth()->user()->id,
            'posts_id' => $this->idPost,
        ]);

        $this->comment = '';
    }
}
