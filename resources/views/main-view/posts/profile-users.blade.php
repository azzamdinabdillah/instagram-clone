@extends('template/layout')

@section('layout')
    @livewire('posts.profile-users', ['username' => $username])
@endsection