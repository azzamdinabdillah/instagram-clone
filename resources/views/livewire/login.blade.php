<div class="bg-white">
    <div class="w-full h-screen flex justify-center items-center xl:bg-putih-gelap-dikit px-5 flex-row-reverse">
        <div class="xl:w-[25%] w-[80%]">
            <div class="xl:bg-white xl:border-2 xl:rounded xl:p-7">
                <h1 class="text-4xl font-bold text-center mb-10 xl:mb-7">Instagram</h1>

                @if (session('loginGagal'))
                    <p class="text-red-600 font-semibold text-sm mb-5">{{ session('loginGagal') }}</p>
                @endif

                <div class="xl:hidden">
                    <button class="w-full text-sm py-2 bg-blue-500 mt-5 font-semibold text-white rounded flex items-center justify-center gap-2 flex-row-reverse">Continue with facebook
                        <i class="fa-brands fa-square-facebook text-lg"></i>
                    </button>
        
                    <div class="flex justify-center items-center w-full">
                        <hr class="my-8 w-full h-px bg-gray-400 border-0 dark:bg-gray-700">
                        <span class="absolute left-1/2 px-3 font-medium text-gray-900 bg-putih-gelap-dikit -translate-x-1/2 dark:text-white dark:bg-gray-900">OR</span>
                    </div>
                </div>
    
                <style>
                    .form-login input:focus ~ .label,
                    .form-login input:valid ~ .label{
                        transform: translate(1px, -18px);
                        font-size: 10px;
                        transition: .5s;
                        transition-property: all;
                    }
                </style>
    
                <div class="block w-[100%]">
                    <form wire:submit.prevent="loginSystem" class="w-full">
                        <div class="relative form-login">
                            <input autocomplete="off" wire:model="username" type="text" id="username" class="bg-[#FAFAFA] block px-2 pb-2 pt-6 w-full border-2 placeholder:text-xs rounded transition text-xs" required="required">
                            <label for="username" class="absolute top-1/2 -translate-y-1/2 left-2 text-xs text-slate-400 label transition-all">Username</label>
                        </div>
                            @error('username')
                            <p class="text-red-600 text-xs my-2">{{ $message }}</p>
                            @enderror
                        <div class="relative form-login mt-4">

                            @if ($showPw == true)
                                <input autocomplete="off" wire:model="password" type="text" id="password" class="bg-[#FAFAFA] block px-2 pb-2 pt-6 w-full border-2 placeholder:text-xs rounded transition text-xs" required="required">
                            @else
                                <input autocomplete="off" wire:model="password" type="password" id="password" class="bg-[#FAFAFA] block px-2 pb-2 pt-6 w-full border-2 placeholder:text-xs rounded transition text-xs" required="required">
                            @endif

                            <label for="password" class="absolute top-1/2 -translate-y-1/2 left-2 text-xs text-slate-400 label transition-all">Password</label>

                            @if ($password != null)
                                {{-- <p wire:click="showPassword" class="absolute text-end text-sm cursor-pointer hover:text-slate-600 text-slate-800 font-semibold top-1/2 -translate-y-1/2 right-4">Show</p> --}}
                                @if ($hidePw == false)
                                    <p wire:click="hidePassword" class="absolute text-end text-sm cursor-pointer hover:text-slate-600 text-slate-800 font-semibold top-1/2 -translate-y-1/2 right-4">Hide</p>
                                @else
                                    <p wire:click="showPassword" class="absolute text-end text-sm cursor-pointer hover:text-slate-600 text-slate-800 font-semibold top-1/2 -translate-y-1/2 right-4">Show</p>
                                @endif
                            @endif

                        </div>
                        @error('password')
                            <p class="text-red-600 text-xs my-2">{{ $message }}</p>
                        @enderror

                        <p class="text-blue-500 text-sm text-end mt-3 xl:hidden">Forgot Password?</p>
        
                        <button type="submit" class="w-full py-1 bg-blue-500 mt-5 xl:mt-4 font-semibold text-white rounded">Log in</button>
                        <p class="mt-7 block xl:hidden text-slate-400 text-sm text-center">Don't have an account? <a href="/register" class="text-blue-500">Sign up</a></p>
                    </form>
    
                    <div class="hidden xl:block">
                        <div class="flex justify-center items-center w-full relative">
                            <hr class="my-8 w-full h-[1.5px] bg-gray-400 dark:bg-gray-700">
                            <span class="absolute left-1/2 px-3 font-medium text-slate-500 bg-white -translate-x-1/2 dark:text-white dark:bg-gray-900">OR</span>
                        </div>
    
                        <button class="w-full text-sm py-2 font-semibold text-blue-800 rounded flex items-center justify-center gap-2 flex-row-reverse">Log in with facebook
                            <i class="fa-brands fa-square-facebook text-lg"></i>
                        </button>
    
                        <p class="text-slate-700 font-semibold text-xs text-center mt-3 ">Forgot Password?</p>
                    </div>
                </div>
                
            </div>

            <div class="hidden xl:block mt-3 w-full">
                <p class="py-5 bg-white border-2 rounded block text-slate-400 text-sm text-center">Dont have an account? <a href="/register" class="text-blue-500">Sign up</a></p>
            </div>

            <div class="mt-5 hidden xl:block">
                <p class="text-center text-sm text-slate-500">Get the app</p>

                <div class="flex justify-center gap-2 mt-5">
                    <div class="bg-black p-1 rounded flex items-center gap-1 cursor-pointer">
                        <img src="/img/playstore-icon.png" alt="" class="w-[23%]">
                        <div class="text-white">
                            <p class="text-[9px]">GET IT ON</p>
                            <p class="font-semibold text-[15px]">Google Play</p>
                        </div>
                    </div>
                    <div class="bg-black p-1 rounded flex items-center gap-1 cursor-pointer">
                        <img src="/img/microsoft-icon.png" alt="" class="w-[23%]">
                        <div class="text-white">
                            <p class="text-[9px]">GET IT FROM</p>
                            <p class="font-semibold text-[15px]">Microsoft</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden xl:block">
            <img src="/img/bg-login-2.png" alt="">
        </div>
    </div>
</div>
