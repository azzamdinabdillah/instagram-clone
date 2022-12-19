<?php

namespace App\Http\Livewire\Posts;

use App\Models\User;
use App\Models\Follow;
use App\Models\FollowUsersDetails;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProfileUsersFollowers extends Component
{
    public $dataUser;
    public $usernamePost;
    public $dataFollowers;
    public $checkFollowers;

    public $dataUserLoginYangFollow;

    public function mount($username)
    {
        $this->usernamePost = $username;
    }

    public function render()
    {
        $this->dataUser = User::where('username', $this->usernamePost)->get()[0];
        $this->dataFollowers = Follow::where('followTo', $this->dataUser->id)->get();
        // dd($this->dataUser->id);
        // dd($this->dataFollowers->where('user_id', auth()->user()->id));

        // $arr = [];

        // foreach ($this->dataFollowers as $row) {
        //     $dataArray = $row->id;
        //     $this->dataUserLoginYangFollow = Follow::where([
        //         'id' => $dataArray,
        //         'user_id' => auth()->user()->id
        //     ])->get();
        //     $arr[] = $this->dataUserLoginYangFollow;
            
        // }
        // dd($arr);

        // dd($this->dataFollowers->id);

        $data = [
            'user_id' => auth()->user()->id,
            'followTo' => $this->dataUser->id,
        ];

        $this->dataUserLoginYangFollow = Follow::where($data)->get();

        // dd($this->dataUserLoginYangFollow);
        return view('livewire.posts.profile-users-followers');
    }

    public function follow($id, $idUser)
    {
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
}
