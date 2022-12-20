<div class="bg-white xl:bg-putih-gelap-dikit">
    <div class="navbar w-full fixed z-10 top-0 left-0 bg-white border-b xl:border-r p-2 xl:w-[17%] xl:h-screen xl:shadow-lg shadow-sm xl:hidden">
        <div class="flex justify-between items-center px-5">
            <h1 class="text-lg font-bold tracking-wider xl:text-2xl xl:mt-7">
                <i class="fa-solid fa-gear"></i>
            </h1>
        
            <div class="flex justify-center items-center gap-2">
                <p class="text-sm font-bold">{{ auth()->user()->username }}</p>
                <i class="fa-solid fa-chevron-down"></i>
            </div>

            <i class="fa-solid fa-user-plus"></i>
        
        </div>
    </div>

    <div class="pt-16 h-screen xl:w-[40%] mx-auto">
        <div class="flex items-center gap-5 xl:gap-10 px-5">
            <img src="https://api.lorem.space/image/face?w=300&h=300&hash={{ Str::random(10) }}" alt="" class="w-[20%] xl:w-[25%] rounded-full">
            <div class="w-full">
                <div class="w-full xl:flex xl:gap-5 xl:items-center">
                    <p class="text-2xl">{{ auth()->user()->username }}</p>
    
                    <div class="w-full border-2 py-1 mt-3 xl:w-[25%]">
                        <a href="/logout" class="text-sm font-semibold text-center">Logout</a>
                    </div>
    
                    {{-- <i class="fa-solid fa-gear text-2xl hidden xl:block"></i> --}}
                </div>

                <div class="hidden xl:flex items-center gap-5 my-3">
                    <div class="text-center flex items-center gap-1">
                        <p class="font-semibold">{{ $dataMyPost->count() }}</p>
                        <p class="text-sm">post</p>
                    </div>

                    <button type="button" data-modal-toggle="defaultModal" class="text-center flex items-center gap-1">
                        <p class="font-semibold">{{ $dataFollowers->count() }}</p>
                        <p class="text-sm">followers</p>
                    </button>
                    <button type="button" data-modal-toggle="defaultModal2" class="text-center flex items-center gap-1">
                        <p class="font-semibold">{{ $dataFollowing->count() }}</p>
                        <p class="text-sm">following</p>
                    </button>
                </div>

                <div class="hidden xl:block">
                    <p class="font-semibold">{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->bio }}</p>    
                </div>

            </div>
        </div>

        <div class="mt-5 px-5 xl:hidden">
            <p class="font-semibold">{{ auth()->user()->name }}</p>
            <p>{{ auth()->user()->bio }}</p>
        </div>

        <div class="hidden xl:inline-block my-5">
            <i class="fa-solid fa-plus text-4xl p-6 border-2 rounded-full"></i>
            <p class="text-center mt-2 font-semibold text-slate-500">New</p>
        </div>

        {{-- ukuran hp --}}
        <div class="border-t-2 mt-5 xl:hidden">
            <div class="flex justify-between items-center px-10 py-2">
                <div class="text-center">
                    <p class="font-semibold">{{ $dataMyPost->count() }}</p>
                    <p class="text-sm">post</p>
                </div>
                <a href="/{{ auth()->user()->username }}/followers" class="text-center">
                    <p class="font-semibold">{{ $dataFollowers->count() }}</p>
                    <p class="text-sm">followers</p>
                </a>
                <a href="/{{ auth()->user()->username }}/followings" class="text-center">
                    <p class="font-semibold">{{ $dataFollowing->count() }}</p>
                    <p class="text-sm">following</p>
                </a>
                
            </div>
        </div>

        
        <div class="mt-2 border-t border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap text-sm font-medium text-center justify-between px-7" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="flex items-center gap-2 p-4 xl:p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <i class="fa-solid fa-border-all text-xl"></i>
                        <p class="text-slate-600 text-sm hidden xl:flex">POST</p>
                    </button>
                </li>
                <li class="mr-2 xl:hidden" role="presentation">
                    <button class="flex items-center gap-2 p-4 xl:p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">
                        <i class="fa-solid fa-list text-xl"></i>
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="flex items-center gap-2 p-4 xl:p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                        <i class="fa-regular fa-bookmark text-xl"></i>
                        <p class="text-slate-600 text-sm hidden xl:flex">SAVED</p>
                    </button>
                </li>
                <li role="presentation">
                    <button class="flex items-center gap-2 p-4 xl:p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">
                        <i class="fa-solid fa-user-tag text-xl"></i>
                        <p class="text-slate-600 text-sm hidden xl:flex">TAGGED</p>
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent" class="pb-32 bg-white xl:bg-putih-gelap-dikit">
            <div class="hidden bg-white xl:bg-putih-gelap-dikit rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="grid grid-cols-3 gap-1 relative">
                    @if ($dataMyPost->count() == 0)
                        <p class="font-semibold text-xl text-center mt-10 absolute left-1/2 -translate-x-1/2">No Post</p>  
                    @else    
                        @foreach ($dataMyPost as $row)
                            <img src="{{ $row->image }}" alt="" class=""> 
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="bg-white xl:hidden xl:bg-putih-gelap-dikit rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="relative">
                    @if ($dataMyPost->count() == 0)
                        <p class="font-semibold text-xl text-center mt-10 absolute left-1/2 -translate-x-1/2">No Post</p>    
                    @else
                        @foreach ($dataMyPost as $row)    
                        <div>
                            <div class="flex justify-between items-center my-5 px-3">
                                <div class="flex items-center gap-3 ">
                                    <img src="{{ $row->users->image }}" alt="" class="w-[12%] rounded-full">
                                    <p class="text-xs font-semibold">{{ $row->users->username }}</p>
                                </div>
                                <i class="fa-solid fa-ellipsis text-2xl"></i>
                            </div>
                
                            <div class="mt-4">
                                <img src="{{ $row->image }}" alt="">
                            </div>
                
                            <div class="flex justify-between items-center p-5">
                                <div class="flex items-center text-2xl gap-5">
                                    @if ($row->dataLikeUser)
                                        <i wire:click="$emit('addLikes', {{ $row->id }})" class="fa-regular p-2 bg-red-500 rounded-full text-white fa-heart font-bold hover:scale-110 transition-all"></i>    
                                    @else   
                                        <i wire:click="$emit('addLikes', {{ $row->id }})" class="fa-regular fa-heart font-bold hover:scale-110 transition-all"></i>
                                    @endif
                                    
                                        <a href="/comments/{{ $row->id }}" class="">
                                         <i class="fa-regular fa-comment hover:scale-110 transition"></i>
                                        </a>

                                    <i class="fa-regular fa-paper-plane text-2xl hover:scale-110 transition"></i>
                                </div>
                                <i class="fa-regular fa-bookmark text-2xl hover:scale-110 transition"></i>
                            </div>
                
                            <div class="px-5 ">
                                <p class="text-sm">{{ $row->likeUsers->count() }} likes</p>
                                <p class="text-sm mt-2">
                                    <span class="font-semibold">{{ $row->users->username }}</span>
                                    {{ $row->descriptions }}
                                </p>
                
                                <a href="/comments/{{ $row->id }}" class="text-slate-500 mt-1 xl:text-sm">View all {{ $row->comments->count() }} comments</a>
                
                                <p class="text-slate-400 text-xs mt-3">{{ $row->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

            </div>

            <div class="hidden bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="flex flex-wrap gap-1 relative">
                    @if ($dataMyPost->count() == 0)
                        <p class="font-semibold text-xl text-center mt-10 absolute left-1/2 -translate-x-1/2">No Post</p>  
                    @else
                        @foreach ($dataMyPost as $row)
                            <img src="{{ $row->users->image }}" alt="" class=""> 
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="hidden p-4 bg-white xl:bg-putih-gelap-dikit rounded-lg dark:bg-gray-800 relative" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <p class="my-3 border-2 border-black rounded-full p-5 mt-3 text-4xl mx-auto absolute left-1/2 -translate-x-1/2">
                    <i class="fa-solid fa-user-tag"></i>
                </p>
                <div class="mt-28">
                    <p class="text-center text-xl font-semibold my-1">Photos of you</p>
                    <p class="text-center text-sm">When people tag you in photos, they'll appear here.</p>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- modal follower --}}
        
        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full" style="background-color: rgba(0, 0, 0, 0.7)">
            <div class="relative w-[30%] h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-xl shadow dark:bg-gray-700 overflow-hidden">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between pt-5 pb-7 px-5 border-b rounded-t dark:border-gray-600 shadow-md">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                            Followers
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="pb-3 -mt-5 px-5 bg-white h-[50vh] overflow-y-scroll">
                        @if ($dataFollowers->count() == 0)
                            <p class="font-semibold text-xl text-center mt-20">No Followers</p> 
                        @else    
                            @foreach ($dataFollowers as $row)    
                            <div class="flex justify-between items-center mt-7">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $row->users->image }}" alt="" class="w-[15%] rounded-full">
                                        <div>
                                            <p class="text-sm font-semibold">{{ $row->users->username }}</p>
                                            <p class="text-sm text-slate-400">{{ $row->users->name }}</p>
                                        </div>
                                    </div>
                            
                                    <button class="text-white font-semibold text-sm py-2 px-4 bg-blue-500 tracking-wide rounded-md">Follow</button>
                                </div>
                                @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- modal following --}}
        
        <!-- Main modal -->
        <div id="defaultModal2" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full" style="background-color: rgba(0, 0, 0, 0.7)">
            <div class="relative w-[30%] h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-xl shadow dark:bg-gray-700 overflow-hidden">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between pt-5 pb-7 px-5 border-b rounded-t dark:border-gray-600 shadow-md">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">
                            Following
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal2">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="pb-3 -mt-5 px-5 bg-white h-[50vh] overflow-y-scroll">
                        @if ($dataFollowing->count() == 0)
                            <p class="font-semibold text-xl text-center mt-20">No Followers</p> 
                        @else    
                            @foreach ($resultFollowing as $row)    
                            <div class="flex justify-between items-center mt-7">
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
            </div>
        </div>
