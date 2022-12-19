@extends('template/layout')

@section('layout')

    @livewire('posts.profile-users-followings', ['username' => $username])
    
@endsection