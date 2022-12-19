<div>
    {{-- foto status --}}
    <div class="mt-16 mb-5 pl-5 xl:bg-white xl:mt-5 xl:p-5 xl:border-2 xl:rounded-lg xl:shadow-sm">
        <div class="swiper mySewiper">
            <div class="swiper-wrapper flex justify-start items-center gap-3">
              @foreach ($allDataUser as $row)    
              <a href="/{{ $row->username }}" class="swiper-slide xl:w-[15%]">
                <img src="{{ $row->image }}" alt="" class="rounded-full">
                <p class="text-center text-xs tracking-wide mt-2">{{ Str::limit($row->username, 10) }}</p>
              </a>
              @endforeach
            </div>
          </div>
    </div>
</div>
