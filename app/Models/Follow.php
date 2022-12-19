<?php

namespace App\Models;

use App\Models\FollowUsersDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $table = 'follows';
    protected $guarded = ['id'];

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function followUser()
    {
        return $this->belongsToMany('follow_users_details', 'user_id', 'follow_id');
    }

    public function checkFollowers()
    {
        return $this->hasOne(FollowUsersDetails::class)->where('user_id', auth()->user()->id);
    }

    // public function UsersFollowings()
    // {
    //     return $this->hasMany(User::class, 'user_id');
    // }
}
