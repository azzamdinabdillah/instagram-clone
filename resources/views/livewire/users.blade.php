<div>
    {{-- tempat follow an --}}
    <div class="absolute right-[13%] top-10 w-[20%] hidden xl:block">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-3 cursor-pointer">
                <img src="https://api.lorem.space/image/face?w=150&h=150&hash={{ Str::random(10) }}" alt="" class="w-[20%] rounded-full">
                <div class="">
                    <p class="font-bold text-sm">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500">{{ auth()->user()->username }}</p>
                </div>
            </div>

            <a href="/logout" class="text-blue-700 font-semibold text-sm cursor-pointer">Logout</a>
        </div>

        <div class="flex justify-between items-center mt-4">
            <p class="text-slate-500 font-semibold text-sm">Suggestion For You</p>
            <p class="text-xs font-semibold">See all</p>
        </div>

        @foreach ($dataUser as $row)
            
        <div class="flex justify-between items-center mt-3">
            <div class="flex items-center gap-3 cursor-pointer">
                {{-- <img src="/img/avatar-1.jpg" alt="" class="w-[15%] rounded-full"> --}}
                <img src="https://api.lorem.space/image/face?w=150&h=150&hash={{ Str::random(10) }}" alt="" class="w-[15%] rounded-full">
                <div class="">
                    <p class="font-bold text-xs">{{ $row->name }}</p>
                    <p class="text-xs text-slate-500">{{ $row->username }}</p>
                </div>
            </div>

            <a href="/{{ $row->username }}" class="text-blue-700 font-semibold text-sm cursor-pointer">Details</a>
        </div>
        @endforeach

        
        <div class="flex justify-between items-center mt-3">
            <div class="flex items-center gap-3 cursor-pointer">
                <img src="/img/avatar-1.jpg" alt="" class="w-[15%] rounded-full">
                <div class="">
                    <p class="font-bold text-xs">Tasya Amelia Putri</p>
                    <p class="text-xs text-slate-500">tasy.a_m91</p>
                </div>
            </div>

            <p class="text-blue-700 font-semibold text-sm cursor-pointer">Follow</p>
        </div>
    </div>
</div>
