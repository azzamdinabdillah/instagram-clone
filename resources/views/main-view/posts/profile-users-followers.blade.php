@extends('template/layout')

@section('layout')

    @livewire('posts.profile-users-followers', ['username' => $username])
    
@endsection