<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'posts';

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likeUsers()
    {
        return $this->belongsToMany(User::class, 'like_post_user', 'posts_id', 'user_id');
    }

    public function dataLikeUser()
    {
        return $this->hasOne(LikePostUser::class)->where('user_id', auth()->user()->id);
    }

    public function Comments()
    {
        return $this->hasMany(Comments::class, 'posts_id');
    }
}
