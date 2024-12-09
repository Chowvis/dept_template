<div x-show="deleteevents" x-transition:enter.scale.20.duration.300ms x-transition:leave.scale.20.duration.100ms x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/0 flex items-center justify-center w-full">
    <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative">
        <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "deleteevents = false"></i>
        <h1 class="text-center font-semibold text-xl p-2 mb-4">Are you sure to delete this logo?</h1>
        <h1 class="text-center text-slate-500 font-semibold text-sm p-2 mb-4">Note: All the data reguarding this card will be deleted!</h1>
        {{$slot}}

    </div>
</div>
