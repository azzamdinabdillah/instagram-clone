<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main-view.index');
    }

    public function profile($username)
    {
        return view('main-view.profile', [
            'username' => $username
        ]);
    }

    public function comments($id)
    {
        return view('main-view.posts.comments', [
            'id' => $id,
        ]);
    }

    public function profileUsers($username)
    {
        return view('main-view.posts.profile-users', [
            'username' => $username,
        ]);
    }

    public function profileUsersFollowers($username)
    {
        return view('main-view.posts.profile-users-followers', [
            'username' => $username,
        ]);
    }

    public function profileUsersFollowings($username)
    {
        return view('main-view.posts.profile-users-followings', [
            'username' => $username,
        ]);
    }
}
