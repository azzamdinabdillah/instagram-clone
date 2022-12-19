<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUsersDetails extends Model
{
    use HasFactory;

    protected $table = 'follow_users_details';
    protected $guarded = ['id'];

    // public function checkFollow()
    // {
    //     return $this->hasOne(Follow::class);
    // }
}
