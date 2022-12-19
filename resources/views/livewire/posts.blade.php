<div>
    <section class="xl:w-[30%] xl:absolute xl:left-1/2 xl:-translate-x-1/2">
        
        @livewire('status.story')

        {{-- postingan --}}

        {{-- @if ($allDataPost->count() == 0)
            <p class="font-semibold text-xl text-center">Maaf Post Tidak Tersedia</p>    
        @else
        @endif --}}
        @foreach ($allDataPost as $row)    
        <div class="bg-white xl:border-2 xl:mt-3 pb-10 shadow-md -z-20">
            <div class="flex justify-between items-center pt-3 px-3">
                <div class="flex items-center gap-3 ">

                    {{-- @if ($row->users->username == null)
                        <a href="#" class="block w-[12%]">
                            <img src="{{ $row->users->image }}" alt="" class="rounded-full">
                        </a>
                    @else    
                    @endif --}}
                    <a href="/{{ $row->users->username }}" class="block w-[12%]">
                        <img src="{{ $row->users->image }}" alt="" class="rounded-full">
                    </a>

                    <a href="/{{ $row->users->username }}" class="text-xs font-semibold block">{{ $row->users->username }}</a>
                </div>
                <i class="fa-solid fa-ellipsis text-2xl"></i>
            </div>

            <div class="mt-4">
                <img wire:click="likeImage({{ $row->id }})" src="{{ $row->image }}" alt="">
            </div>

            <div class="flex justify-between items-center p-5">
                <div class="flex items-center text-2xl gap-5">
                    @if ($row->dataLikeUser)
                        <i wire:click="$emit('addLikes', {{ $row->id }})" class="fa-regular p-2 bg-red-500 rounded-full text-white fa-heart font-bold hover:scale-110 transition-all"></i>    
                    @else   
                        <i wire:click="$emit('addLikes', {{ $row->id }})" class="fa-regular fa-heart font-bold hover:scale-110 transition-all"></i>
                    @endif
                    {{-- @if ($row->dataLikeUser)
                        <i wire:click="Likes({{ $row->id }})" class="fa-regular p-2 bg-red-500 rounded-full text-white fa-heart font-bold hover:scale-110 transition-all"></i>    
                    @else   
                        <i wire:click="Likes({{ $row->id }})" class="fa-regular fa-heart font-bold hover:scale-110 transition-all"></i>
                    @endif --}}
                    
                    {{-- <i wire:click="Likes({{ $row->id }})" class="fa-regular fa-heart font-bold hover:scale-110 transition"></i> --}}
                    <a href="/comments/{{ $row->id }}" class="xl:hidden">
                        <i class="fa-regular fa-comment hover:scale-110 transition"></i>
                    </a>
                    
                    {{-- button modal untuk comment ukuran layar besar --}}
                    {{-- <button wire:click="$emit('modalComment', $row->id) type="button" data-modal-toggle="defaultModal" class="xl:block hidden">
                        <i class="fa-regular fa-comment hover:scale-110 transition"></i>
                    </button> --}}
                    {{-- button modal untuk comment ukuran layar besar --}}
                    <button wire:click="ModalComment({{ $row->id }})" type="button" data-modal-toggle="defaultModal" class="xl:block hidden">
                        <i class="fa-regular fa-comment hover:scale-110 transition"></i>
                    </button>
                    
                    <i class="fa-regular fa-paper-plane text-2xl hover:scale-110 transition"></i>
                </div>
                <i class="fa-regular fa-bookmark text-2xl hover:scale-110 transition"></i>
            </div>

            <div class="px-5 ">
                <p class="text-sm">{{ $row->likeUsers->count() }} Likes</p>

                <p class="text-xs font-semibold my-2">Disukai juga oleh : 

                    @foreach ($row->likeUsers->take(3) as $like)
                        <span class="text-xs text-slate-700 font-semibold">{{ $like->username, 10 }}, </span>
                    @endforeach......
                </p>

                <p class="text-sm mt-2">
                    <span class="font-semibold">{{ $row->users->name }}</span>
                    {{ $row->descriptions }}
                </p>
                {{-- <p class="text-sm mt-2">
                    <span class="font-semibold">{{ $row->users->name }}</span>
                    {{ ($moreDescs == false) ? Str::limit($row->descriptions, 100) : $row->descriptions }}
                    <span wire:click.prevent="moreDesc({{ $row->likes }})" class="text-slate-400 font-semibold cursor-pointer hover:text-slate-600">...more</span>
                </p> --}}

                <a href="/comments/{{ $row->id }}" class="text-slate-500 mt-2 block xl:text-sm">View all {{ $row->comments->count() }} comments</a>

                <p class="text-slate-400 text-xs mt-3">{{ $row->created_at->diffForHumans() }}</p>
            </div>

        </div>
        @endforeach
        

        <div class="xl:my-10 mb-20 my-7 flex justify-center">
            <button id="load-more" class="px-5 py-2 bg-blue-500 text-white rounded-full font-semibold hover:scale-110 transition">Load More</button>
        </div>

        <script type="text/javascript">
            document.getElementById('load-more').onclick = function() {
                 window.livewire.emit('post-data');
        };
        </script>

        {{-- <script type="text/javascript">
            window.onscroll = function (ev) {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    window.livewire.emit('post-data');
                }
            };
        </script> --}}

    </section>

    {{-- modal untuk comment di ukuran pc --}}
    <!-- Modal toggle -->
    <!-- Main modal -->
   
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full {{ ($idPost == 0) ? 'hidden' : '' }}" style="background-color: rgba(0,0,0,0.5);">
        <div class="relative h-full w-[60%] md:h-auto {{ ($idPost > 0) ? 'left-1/2 -translate-x-1/2' : 'hidden' }}">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden">
                <!-- Modal body -->
                <div class="w-full bg-black">
                    @if ($idPost > 0)
                    <div class="flex justify-center items-center">
                        <img src="{{ $dataPost->image }}" alt="" class="w-[50%]">
                        <div class="w-[100%] py-5 px-5 bg-white">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-4">
                                    <img src="{{ auth()->user()->image }}" alt="" class="w-[10%] rounded-full">
                                    <div>
                                        <h1 class="font-semibold text-black mb-1">{{ auth()->user()->username }}</h1>
                                    </div>
                                </div>
                                <i class="fa-solid fa-ellipsis text-xl mr-2 cursor-pointer"></i>
                            </div>
                            <hr class="text-slate-800 h-px w-full border-1 mt-5">

                            <style>
                                /* Sembunyikan scrollbar dari Chrome, Safari dan Opera */
                                .comment::-webkit-scrollbar {
                                    display: none;
                                }
                            </style>

                            <div class="overflow-y-scroll h-[55vh] py-3 comment">
                            <div class="flex items-start gap-4">
                                <img src="{{ $dataPost->users->image }}" alt="" class="w-[12%] rounded-full">
                                <div>
                                    <h1 class="font-semibold text-black mb-1">{{ $dataPost->users->username }}</h1>
                                    <p class="text-sm leading-relaxed">{{ $dataPost->descriptions }}</p>
                                </div>
                            </div>
                            <hr class="text-slate-800 h-px w-full border-1 mt-5">

                            @if ($dataComment->count() == 0)
                                <p class="text-center font-semibold text-lg w-full pt-20">No Comment</p>
                            @else    
                                @foreach ($dataComment as $row)    
                                <div class="flex items-start gap-3 bg-white py-5">
                                    <img src="{{ $row->commentUsers->image }}" alt="" class="w-[12%] rounded-full">
                                    <div>
                                        <p class="text-sm">
                                            <span class="font-semibold">{{ $row->commentUsers->username }}</span>
                                            {{ $row->comment }}
                                        </p>
                                        <div class="flex justify-start gap-3 text-xs mt-1.5">
                                            <p class="text-slate-400">1d</p>
                                            <p class="text-slate-400">3 likes</p>
                                            <p class="text-slate-400">Reply</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            
                            </div>
                            <hr class="text-slate-800 h-px w-full border-1 mb-5">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center text-2xl gap-5">

                                    {{-- @if ($allDataPost->dataLikeUser)
                                        <i wire:click="$emit('addLikes', {{ $row->id }})" class="fa-regular p-2 bg-red-500 rounded-full text-white fa-heart font-bold hover:scale-110 transition-all"></i>    
                                    @else   
                                        <i wire:click="$emit('addLikes', {{ $row->id }})" class="fa-regular fa-heart font-bold hover:scale-110 transition-all"></i>
                                    @endif --}}
                                    
                                    <button class="xl:block hidden">
                                        <i class="fa-regular fa-comment hover:scale-110 transition"></i>
                                    </button>
                                    
                                    <i class="fa-regular fa-paper-plane text-2xl hover:scale-110 transition"></i>
                                </div>
                                <i class="fa-regular fa-bookmark text-2xl hover:scale-110 transition"></i>
                            </div>
                            <p class="font-bold text-sm my-2">{{ $dataPost->likeUsers->count() }} Likes</p>
                            <p class="text-xs text-slate-400">{{ $dataPost->created_at->diffForHumans() }}</p>
                            <hr class="text-slate-800 h-px w-full border-1 mt-3 mb-3">
                            <form wire:submit.prevent="addComment" class="relative w-full">
                                <input wire:model="comment" type="text" class="w-full border-none pl-16 outline-none" placeholder="Add a comment......">
                                <i class="fa-regular fa-face-smile absolute left-0 top-1/2 -translate-y-1/2 text-2xl"></i>
                                <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-0 text-blue-500 font-semibold">Post</button>
                            </form>
                        </div>  
                        </div>

                    @endif
                    </div>
            </div>
        </div>
    </div>


    {{-- end modal --}}
    
</div>

