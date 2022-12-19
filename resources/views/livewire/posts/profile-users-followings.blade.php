<div>
    <div class="navbar w-full fixed z-10 top-0 left-0 bg-white border-b xl:border-r p-2 xl:w-[17%] xl:h-screen xl:shadow-lg shadow-sm xl:hidden">
        <div class="flex justify-between items-center px-5">
            <a href="/{{ $dataUser->username }}" class="text-lg font-bold tracking-wider xl:text-2xl xl:mt-7">
                <i class="fa-solid fa-chevron-left text-xl"></i>
            </a>
        
            <div class="flex justify-center items-center gap-2">
                <p class="text-sm font-bold">Followings</p>
                {{-- <i class="fa-solid fa-chevron-down"></i> --}}
            </div>

            <i class="fa-solid fa-user-plus"></i>
        
        </div>
    </div>

    <div class="py-10 px-5 bg-white">
        @if ($dataFollowing->count() == 0)
            <p class="font-semibold text-xl text-center mt-20">No Followings</p> 
        @else    
            @foreach ($resultFollowing as $row)    
            <div class="flex justify-between items-center my-7">
                    <div class="flex items-center gap-3">
                        <img src="{{ $row->image }}" alt="" class="w-[15%] rounded-full">
                        <div>
                            <p class="text-sm font-semibold">{{ $row->username }}</p>
                            <p class="text-sm text-slate-400">{{ $row->name }}</p>
                        </div>
                    </div>
            
                    <button class="text-white font-semibold text-sm py-2 px-4 bg-blue-500 tracking-wide rounded-md">Follow</button>
                </div>
                @endforeach
        @endif
    </div>
</div>
