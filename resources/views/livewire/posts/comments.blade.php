<div class="bg-white">
    <div class="navbar w-full fixed z-10 top-0 left-0 bg-white border-b xl:border-r p-2 xl:w-[17%] xl:h-screen xl:shadow-lg shadow-sm xl:hidden">
        <div class="flex justify-between items-center px-5">
            <a href="/" class="text-lg font-bold tracking-wider xl:text-2xl xl:mt-7">
                <i class="fa-solid fa-chevron-left text-xl"></i>
            </a>
        
            <div class="flex justify-center items-center gap-2">
                <p class="text-sm font-semibold">Comments</p>
            </div>

            <i class="fa-regular fa-paper-plane text-xl"></i>
        </div>
    </div>

    <section class="bg-white pb-32">
        <div class="bg-gray-100 w-full py-4 mt-10 fixed top-0">
            <div class="flex justify-center items-center gap-4 px-5">
                <img src="{{ auth()->user()->image }}" alt="" class="w-[13%] rounded-full">
                <form wire:submit.prevent="addComment" class="w-full relative">
                    <input wire:model="comment" type="text" class="py-2.5 px-5 w-full rounded-full border-none outline-none" placeholder="Add a comment....." required="on" autocomplete="off">
                    <button class="absolute top-1/2 -translate-y-1/2 right-5 text-blue-500 font-semibold hover:text-blue-700">Post</button>
                </form>
            </div>
        </div>
    
        <div class="pt-36 bg-white">
            <div class="flex items-start px-5 gap-5">
                <img src="{{ $dataPost->users->image }}" alt="" class="w-[15%] rounded-full">
                <div>
                    <p class="font-bold mb-1">{{ $dataPost->users->username }}</p>
                    <p class="text-sm leading-relaxed">{{ $dataPost->descriptions }}</p>
                </div>
            </div>
            <hr class="text-slate-800 h-px w-full border-1 mt-10">
        </div>
    
        @if ($dataComment->count() == 0)
            <p class="text-center font-semibold text-lg w-full h-full py-20">No Comment</p>
        @else    
            @foreach ($dataComment as $row)    
            <div class="flex items-start gap-3 bg-white px-3 py-5">
                <img src="{{ $row->commentUsers->image }}" alt="" class="w-[12%] rounded-full">
                <div>
                    <p class="text-sm">
                        <span class="font-semibold">{{ $row->commentUsers->username }}</span>
                        {{ $row->comment }}
                    </p>
                    <div class="flex justify-start gap-3 text-xs mt-1.5">
                        <p class="text-slate-400">{{ $row->created_at->diffForHumans() }}</p>
                        <p class="text-slate-400">3 likes</p>
                        <p class="text-slate-400">Reply</p>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

    </section>

</div>
