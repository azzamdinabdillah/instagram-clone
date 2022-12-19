<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram CLone</title>
    {{-- @vite('resources/css/app.css') --}}

    <link rel="stylesheet" href="/build/assets/app.37c7543d.css">

    <script src="https://kit.fontawesome.com/9a3f20c4de.js" crossorigin="anonymous"></script>

    {{-- <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css"> --}}
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/9a3f20c4de.js" crossorigin="anonymous"></script>

    {{-- flowbite --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" /> --}}

    <style>
        /* Sembunyikan scrollbar dari Chrome, Safari dan Opera */
        *::-webkit-scrollbar {
            display: none;
        }
    </style>

    @livewireStyles

</head>
<body class="bg-[#FAFAFA]">

    @if (!request()->routeIs('login') && !request()->routeIs('register'))   
        {{-- navbar top --}}
        <div class="navbar w-full fixed z-10 top-0 left-0 bg-white border-b xl:border-r p-2 xl:w-[17%] xl:h-screen xl:shadow-lg shadow-sm">

            <p class="text-3xl font-bold pt-14 pl-5 hidden xl:block">Instagram</p>

            <style>
                .menu:hover i{
                    transform: scale(1.1);
                    transition: .5s;
                }
            </style>
                
            <div class="px-1 mt-16 hidden xl:block">
                <a href="/" class="flex justify-start gap-5 items-center mb-5 hover:bg-[#F9F9F9] p-4 rounded-full menu transition cursor-pointer {{ (request()->routeIs('home')) ? 'bg-[#F9F9F9]' : 'bg-white' }}">
                    <i class="fa-solid fa-house text-2xl"></i>
                    <h1 class="text-base {{ (request()->routeIs('home')) ? 'font-bold' : 'font-semibold' }}">Home</h1>
                </a>
                <div class="flex justify-start gap-5 items-center mb-5 hover:bg-[#F9F9F9] p-4 rounded-full menu transition cursor-pointer">
                    <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                    <h1 class="text-base font-semibold">Search</h1>
                </div>
                <div class="flex justify-start gap-5 items-center mb-5 hover:bg-[#F9F9F9] p-4 rounded-full menu transition cursor-pointer">
                    <i class="fa-regular fa-compass text-2xl"></i>
                    <h1 class="text-base font-semibold">Explore</h1>
                </div>
                <div class="flex justify-start gap-5 items-center mb-5 hover:bg-[#F9F9F9] p-4 rounded-full menu transition cursor-pointer">
                    <i class="fa-regular fa-paper-plane text-2xl"></i>
                    <h1 class="text-base font-semibold">Messages</h1>
                </div>
                <a href="/profile/{{ auth()->user()->username }}" class="flex justify-start gap-5 items-center mb-5 hover:bg-[#F9F9F9] p-4 rounded-full menu transition cursor-pointer {{ (request()->routeIs('profile.username')) ? 'bg-[#F9F9F9]' : 'bg-white' }}">
                    <i class="fa-solid fa-user text-2xl"></i>
                    <h1 class="text-base block {{ (request()->routeIs('profile.username')) ? 'font-bold' : 'font-semibold' }}">Profile</h1>
                </a>
            </div>
        </div>

        {{-- navbar bottom --}}
        <div class="w-full fixed bottom-0 left-0 bg-white border-t xl:hidden z-50">
            <div class="flex justify-between items-center px-7 py-4">
                <a href="/">
                    <i class="fa-solid fa-house text-2xl"></i>
                </a>
                <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                <i class="fa-regular fa-compass text-2xl"></i>
                <i class="fa-regular fa-paper-plane text-2xl"></i>
                <a href="/profile/{{ auth()->user()->username }}" class="block w-[9%]">
                    <img src="/img/avatar-1.jpg" alt="" class="rounded-full ">
                </a>
            </div>

        </div>
    @endif


    @yield('layout')

    {{-- <script src="node_modules/swiper/swiper-bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

      {{-- flowbite js --}}
      <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    
    
    @livewireScripts

    <script type="text/javascript">
        var swiper = new Swiper(".mySewiper", {
          slidesPerView: 5,
          spaceBetween: 10,
        //   centeredSlides: true,
        });
      </script>


</body>
</html>