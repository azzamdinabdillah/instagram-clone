@extends('template/layout')

@section('layout')
    @livewire('posts.comments', ['id' => $id])
@endsection