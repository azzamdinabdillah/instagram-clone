<div class="bg-white xl:bg-putih-gelap-dikit">
    <div class="navbar w-full fixed z-10 top-0 left-0 bg-white border-b xl:border-r p-2 xl:w-[17%] xl:h-screen xl:shadow-lg shadow-sm xl:hidden">
        <div class="flex justify-between items-center px-5">
            <a href="/" class="text-lg font-bold tracking-wider xl:text-2xl xl:mt-7">
                <i class="fa-solid fa-chevron-left text-xl"></i>
            </a>
        
            <div class="flex justify-center items-center gap-2">
                <p class="text-sm font-bold">{{ $dataUser->username }}</p>
                <i class="fa-solid fa-chevron-down"></i>
            </div>

            <i class="fa-solid fa-user-plus"></i>
        
        </div>
    </div>

    <div class="pt-16 h-screen xl:w-[40%] mx-auto">
        <div class="flex items-center gap-5 xl:gap-10 px-5">
            <img src="{{ $dataUser->image }}" alt="" class="w-[20%] xl:w-[25%] rounded-full">
            <div class="w-full">
                <div class="w-full xl:flex xl:gap-5 xl:items-center">
                    <p class="text-2xl">{{ $dataUser->username }}</p>
    
                    <div class="w-full mt-3 xl:w-[25%] flex justify-start items-center gap-3">
                        @if ($checkFollowers->count() > 0)
                            <button wire:click="follow" class="text-sm border-2 py-1 px-5 font-semibold text-center shadow hover:bg-slate-200 transition cursor-pointer">Following</button>
                        @else
                            <button wire:click="follow" class="text-sm bg-blue-500 rounded-md text-white py-1 px-4 font-semibold text-center hover:bg-blue-400 transition cursor-pointer">Following</button>
                        @endif
                        <p class="text-sm border-2 py-1 px-5 font-semibold text-center">Message</p>
                    </div>
    
                    {{-- <i class="fa-solid fa-gear text-2xl hidden xl:block"></i> --}}
                </div>

                <div class="hidden xl:flex items-center gap-5 my-5">
                    <div class="text-center flex items-center gap-1">
                        <p class="font-semibold">{{ $dataUser->posts->count() }}</p>
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
                    <p class="font-semibold">{{ $dataUser->name }}</p>
                    <p>{{ $dataUser->bio }}</p>    
                </div>

            </div>
        </div>

        <div class="mt-5 px-5 xl:hidden">
            <p class="font-semibold">{{ $dataUser->name }}</p>
            <p class="text-sm tracking-wide mb-2">{{ $dataUser->bio }}</p>
        </div>

        <div class="hidden xl:inline-block my-5">
            <i class="fa-solid fa-plus text-4xl p-6 border-2 rounded-full"></i>
            <p class="text-center mt-2 font-semibold text-slate-500">New</p>
        </div>

        {{-- ukuran hp --}}
        <div class="border-t-2 mt-5 xl:hidden">
            <div class="flex justify-between items-center px-10 py-2">
                <div class="text-center">
                    <p class="font-semibold">{{ $dataUser->posts->count() }}</p>
                    <p class="text-sm">post</p>
                </div>
                <a href="/{{ $dataUser->username }}/followers" class="text-center">
                    <p class="font-semibold">{{ $dataFollowers->count() }}</p>
                    <p class="text-sm">followers</p>
                </a>
                <a href="/{{ $dataUser->username }}/followings" class="text-center">
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
                <li class="mr-2 " role="presentation">
                    <button class="flex items-center gap-2 p-4 xl:p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                        <i class="fa-regular fa-bookmark text-xl"></i>
                        <p class="text-slate-600 text-sm hidden xl:flex">SAVED</p>
                    </button>
                </li>
                <li role="presentation" class="">
                    <button class="flex items-center gap-2 p-4 xl:p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">
                        <i class="fa-solid fa-user-tag text-xl"></i>
                        <p class="text-slate-600 text-sm hidden xl:flex">TAGGED</p>
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent" class="pb-28 bg-white xl:bg-putih-gelap-dikit">
            <div class="hidden bg-white xl:bg-putih-gelap-dikit rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="grid grid-cols-3 gap-1 relative">
                    @if ($dataUserPost->count() == 0)
                        <p class="font-semibold text-xl text-center mt-10 absolute left-1/2 -translate-x-1/2">No Post</p>  
                    @else    
                        @foreach ($dataUserPost as $row)
                            {{-- <button wire:click="ModalComment({{ $row->id }})" type="button" data-modal-toggle="defaultModal3" class="xl:block">
                                <img src="{{ $row->image }}" alt="" class=""> 
                            </button> --}}
                            {{-- <button wire:click="ModalComment({{ $row->id }})" type="button" id="myBtn" class="xl:block">
                                <img src="{{ $row->image }}" alt="" class=""> 
                            </button> --}}
                            <img src="{{ $row->image }}" alt="" class=""> 
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="bg-white xl:hidden xl:bg-putih-gelap-dikit rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                @if ($dataUserPost->count() == 0)
                    <p class="font-semibold text-xl text-center mt-10">No Post</p>   
                @else
                    @foreach ($dataUserPost as $row)    
                    <div>
                        <div class="flex justify-between items-center my-5 px-3">
                            <div class="flex items-center gap-3 ">
                                <img src="{{ $row->image }}" alt="" class="w-[12%] rounded-full">
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
                                <a href="/comments/{{ $row->id }}" class="xl:hidden">
                                    <i class="fa-regular fa-comment hover:scale-110 transition"></i>
                                    </a>
                                <i class="fa-regular fa-paper-plane text-2xl hover:scale-110 transition"></i>
                            </div>
                            <i class="fa-regular fa-bookmark text-2xl hover:scale-110 transition"></i>
                        </div>
            
                        <div class="px-5 ">
                            <p class="text-sm">{{ $row->likeUsers->count() }} Likes</p>
                            <p class="text-sm mt-2">
                                <span class="font-semibold">{{ $row->users->username }}</span>
                                {{ $row->descriptions }}
                            </p>
            
                            <a href="/comments/{{ $row->id }}" class="text-slate-500 mt-2 xl:text-sm block">View all {{ $row->comments->count() }} comments</a>
            
                            <p class="text-slate-400 text-xs mt-3">{{ $row->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="hidden bg-white xl:bg-putih-gelap-dikit rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="flex flex-wrap gap-1">
                    @foreach ($dataUserPost as $row)
                        <img src="{{ $row->image }}" alt="" class="w-[32.5%]">
                    @endforeach
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
                            <div class="flex justify-between items-center gap-5 mt-7">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $row->users->image }}" alt="" class="w-[15%] rounded-full">
                                        <div>
                                            <p class="text-sm font-semibold">{{ $row->users->username }}</p>
                                            <p class="text-sm text-slate-400">{{ $row->users->name }}</p>
                                        </div>
                                    </div>
                            
                                    @if ($row->checkFollowers)
                                        <button wire:click="followFollowers({{ $row->id }}, '{{ $row->users->id }}')" class="text-black border-2 font-semibold text-sm py-2 px-4 bg-slate-100 tracking-wide rounded-md">Followed</button>
                                    @else
                                        <button wire:click="followFollowers({{ $row->id }}, '{{ $row->users->id }}')" class="text-white font-semibold text-sm py-2 px-4 bg-blue-500 tracking-wide rounded-md">Follow</button>
                                    @endif
                                    {{-- <button class="text-white font-semibold text-sm py-2 px-4 bg-blue-500 tracking-wide rounded-md">Follow</button> --}}
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


        {{-- modal untuk comment di ukuran pc --}}
    <!-- Modal toggle -->
    <!-- Main modal -->
   
    <div id="defaultModal3" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-[100] w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full {{ ($idPost == 0) ? 'hidden' : '' }}" style="background-color: rgba(0,0,0,0.5);">
        <div class="relative h-full w-[60%] md:h-auto {{ ($idPost > 0) ? 'left-1/2 -translate-x-1/2' : 'hidden' }} z-50">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden h-screen z-50">
                <!-- Modal body -->
                <div class="w-full bg-black relative z-50">
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
                                    @if ($row->dataLikeUser)
                                        <i class="fa-regular p-2 bg-red-500 rounded-full text-white fa-heart font-bold hover:scale-110 transition-all"></i>    
                                    @else   
                                        <i class="fa-regular fa-heart font-bold hover:scale-110 transition-all"></i>
                                    @endif
                                    
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



    {{-- <style>
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
          background-color: #fefefe;
          margin: auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
        }
        
        /* The Close Button */
        .close {
          color: #aaaaaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
        </style> --}}
    <!-- The Modal -->
<div id="myModal" class="modal hidden fixed top-0 left-0 z-[100] w-full p-4 h-screen" style="background-color: rgba(0,0,0,0.5)">

    <!-- Modal content -->
    <div class="modal-content bg-white w-[60%] m-auto">
      <span class="close">&times;</span>
      <p>Some text in the Modal..</p>
    </div>
  
  </div>

  <script>
    // Get the modal
    var modal = document.getElementById("myModal");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
  
