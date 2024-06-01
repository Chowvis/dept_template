{{-- container --}}
<div class=" text-white font-bold max-w-[1280px] w-full flex justify-between items-center">
    {{-- left logo and department name--}}
    <div class="flex items-center">
        <div>
            <img class="h-[100px] p-2" src="logos/pngegg.png" height="100" alt="">
        </div>
        <div class="text-black block">
            <p class="font-medium">Department of Education</p>
            <p class=" font-bold text-2xl">Government of Arunachal</p>
        </div>
    </div>
    {{-- right logo / having two or can be more which have one fix logo for digital india and other editable--}}
    <div class="flex items-center gap-2">
        <div id="db_logo1" class="hidden sm:block">
            {{-- will be used by admin --}}


            @if ($logo1)
                <img src="/storage/{{$logo1->logoimage}}" class="w-36">
            @endif
        </div>
        <div id="db_logo2" class="hidden">
            {{-- will be used by admin --}}
            <img src="" alt="">
        </div>
        <div class="hidden sm:block">
            <img src="logos/digitalindia.png" class=" w-36" alt="">
        </div>
    </div>
</div>
