<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePostUser extends Model
{
    use HasFactory;

    protected $table = 'like_post_user';
    protected $guarded = ['id'];
}
