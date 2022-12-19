<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'comments';

    public function commentUsers()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function commentPosts()
    {
        return $this->belongsTo(Posts::class, 'posts_id');
    }
}
