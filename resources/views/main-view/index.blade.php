@extends('template/layout')

@section('layout')
    
    <div class="navbar w-full fixed z-10 top-0 left-0 bg-white border-b xl:border-r p-2 xl:w-[17%] xl:h-screen xl:shadow-lg shadow-sm xl:hidden">
        <div class="flex justify-between items-center px-5">
            <h1 class="text-lg font-bold tracking-wider xl:text-2xl xl:mt-7">Instagram</h1>
        
            <div class="flex justify-center items-center gap-5 xl:hidden">
                <i class="fa-solid fa-plus border-2 text-xl p-1 rounded-lg font-bold hover:scale-110 transition"></i>
                <i class="fa-regular fa-heart text-xl font-bold hover:scale-110 transition"></i>
            </div>
        
        </div>
    </div>

    @livewire('posts')
    
    @livewire('users')

@endsection