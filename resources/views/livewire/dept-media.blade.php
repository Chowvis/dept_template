<div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
    {{-- heading logo--}}
    <div>
        <div>
            <p class="text-gray-800 font-bold text-xl">External logo for Heading</p>
            <p class="py-2 text-gray-400">Upload your additional logo for the header. Mainly use for national events.</p>

            <div class="w-full rounded-lg">
                <div class="grid lg:grid-cols-2 grid-cols-1 pb-5 gap-4">
                    {{-- left card --}}
                    <div x-data = "{cardleft:false,removecardleft:false,confirmmessage1:false}" class="flex flex-col border border-slate-200 rounded-md bg-white p-6 gap-4">
                        <div class="inline-flex ">
                            <h1 class="font-bold text-xs text-slate-700 bg-slate-200 py-2 px-4 rounded-full">
                                Logo 1
                            </h1>
                        </div>
                        <div class="flex justify-left items-center gap-3 h-full w-full object-cover relative">
                            @if ($logo1===null)
                                <i class="fa-solid fa-mountain-sun text-3xl"></i>
                            @elseif ($logo1->logoimage)
                                <img src="/storage/{{$logo1->logoimage}}" class="rounded-lg w-36 object-cover "  alt="">
                            @else
                                <i class="fa-solid fa-mountain-sun text-3xl"></i>
                            @endif

                            <div class="flex flex-col justify-start">

                                <h2 class="font-bold text-2xl">{{$logo1===null?'Logo name':$logo1->name}}</h2>
                                <p class="text-lg font-semibold text-gray-500">{{$logo1===null?'example@mail.com':$logo1->url}}</p>

                            </div>

                            <button wire.prevent class="absolute right-0 top-0 rounded-full">
                                <i @click = 'cardleft = true' class="fa-solid fa-pen-to-square bg-green-400/50
                                         hover:scale-110 ease-in-out duration-300
                                         text-green-800 p-2 rounded-full cursor-pointer">
                                </i>
                            </button>
                            @if ($logo1)
                            <button wire.prevent class="absolute right-12 top-0 bg-red-400/50 w-8 rounded-full">
                                <i @click = 'removecardleft = true' class="fa-solid fa-trash
                                         hover:scale-110 ease-in-out duration-300
                                         text-red-800 p-2 rounded-full cursor-pointer">
                                </i>

                            </button>
                            @endif
                        </div>


                        <div x-show="cardleft" x-transition x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                            <div class="w-full md:w-[80%] bg-white p-5 rounded-lg shadow-3xl relative">
                                <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "cardleft = false"></i>
                                <h1 class="text-center font-semibold text-xl p-2 mb-4">Edit card 1</h1>
                                <div x-data="{showMessage: false}" x-init="window.addEventListener('flashMessage', () => { showMessage = true; setTimeout(() => { showMessage = false; }, 3000); })">
                                    @if (session('success_card'))

                                        <div x-show="showMessage" x-transition:enter.scale.50.duration.300ms x-transition:leave.scale.50.duration.300ms class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                            <span class="font-medium">{{session('success_card')}}</span>
                                        </div>

                                    @endif
                                </div>
                                {{-- form 1 --}}
                                <form class=" bg-white border border-gray-300 rounded-md p-3" wire:submit="editleftlogo">

                                    {{-- image file --}}
                                    <div class="relative flex justify-center">
                                        <div class="flex p-3 justify-center absolute -top-10">
                                            <div class=" flex h-32 w-auto justify-center rounded-md items-center bg-slate-100 relative shadow-lg ">
                                                <div class="h-28 w-48 flex justify-center  items-center relative">
                                                    @if ($logo1===null)
                                                        <i class="fa-solid fa-mountain-sun text-3xl"></i>
                                                    @elseif ($logo1->logoimage)
                                                        <img src="/storage/{{$logo1->logoimage}}" class="w-44 object-cover" alt="">
                                                    @else
                                                        <i class="fa-solid fa-mountain-sun text-3xl"></i>
                                                    @endif

                                                </div>

                                                <input type="file" name="logo_image" wire:model="logoval.logoimage" id="logoimage" accept="image/*" class=" hidden">
                                                <label for="logoimage" class="cursor-pointer absolute  -bottom-4 flex items-center justify-center w-8 h-8 bg-white rounded-full shadow-lg hover:bg-gray-300">
                                                    <i class="fa-solid fa-pen text-xs text-gray-500"></i>
                                                </label>
                                                @if ($logoval->logoimage)
                                                    <div class="absolute z-10">
                                                        <img src="{{$logoval->logoimage->temporaryUrl()}}" class="w-44 bg-white" alt="">
                                                    </div>
                                                @endif

                                            </div>

                                        </div>
                                        @error('logoval.logoimage')
                                                <span class="text-red-500 text-sm">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="grid lg:grid-cols-2 grid-cols-1 pb-5 mt-32 border-t border-gray-300">
                                        <div class="flex flex-col p-3">
                                            <label for="fname" class="text-sm mt-3 mb-2 font-bold">Full Name</label>
                                            <input value="" type="text" name="name" wire:model="logoval.name" placeholder="Enter full name" class="border border-gray-300 rounded-md p-2 text-sm">
                                            @error('logoval.name')
                                                <span class="text-red-500 text-sm">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="flex flex-col p-3">
                                            <label for="url" class="text-sm mt-3 mb-2 font-bold">Event url</label>
                                            <input value="" type="url" name="postname" wire:model="logoval.url" placeholder="Enter Designation" class="border border-gray-300 rounded-md p-2 text-sm">
                                            @error('logoval.url')
                                                <span class="text-red-500 text-sm">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="p-3 pb-5">

                                        <button class=" inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent
                                        rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                        hover:bg-blue-800 focus:bg-gray-700">save</button>
                                        <div @click = "cardleft = false" class=" inline-flex items-center px-4 py-2
                                            rounded-md font-bold text-xs text-black uppercase tracking-widest border
                                        hover:shadow-xl hover:text-red-500 cursor-pointer">cancel</div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <x-deletecard>
                            <form wire:submit = "deletelogo1" class="flex justify-center gap-3">
                                <button @click = "confirmmessage1 = true,removecardleft = false " class=" inline-flex items-center px-4 py-2 bg-red-600 border border-transparent
                                rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                hover:bg-red-800 ">Delete
                                </button>
                                <div @click = "removecardleft = false" class=" inline-flex items-center px-4 py-2
                                    rounded-md font-bold text-xs text-black uppercase tracking-widest border
                                hover:shadow-xl hover:text-red-500 cursor-pointer">cancel
                                </div>
                            </form>
                            hello

                        </x-deletecard>
                        {{-- <div x-show="removecardleft" x-transition:enter.scale.20.duration.300ms x-transition:leave.scale.20.duration.100ms x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/0 flex items-center justify-center w-full">
                            <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative">
                                <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "removecardleft = false"></i>
                                <h1 class="text-center font-semibold text-xl p-2 mb-4">Are you sure to delete this logo?</h1>
                                <h1 class="text-center text-slate-500 font-semibold text-sm p-2 mb-4">Note: All the data reguarding this card will be deleted!</h1>
                                <form wire:submit = "deletelogo1" class="flex justify-center gap-3">
                                    <button @click = "confirmmessage1 = true,removecardleft = false " class=" inline-flex items-center px-4 py-2 bg-red-600 border border-transparent
                                    rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                     hover:bg-red-800 ">Delete
                                    </button>
                                    <div @click = "removecardleft = false" class=" inline-flex items-center px-4 py-2
                                        rounded-md font-bold text-xs text-black uppercase tracking-widest border
                                    hover:shadow-xl hover:text-red-500 cursor-pointer">cancel
                                    </div>
                                </form>

                            </div>
                        </div> --}}
                        <div x-show="confirmmessage1"
                            x-transition
                            x-cloak
                            class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                            <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative ">
                                <div class="flex flex-col items-center justify-center p-10 ">
                                    <i class="fa-regular fa-circle-check text-3xl text-green-800"></i>
                                    <h1 class="text-center font-semibold text-xl p-2 mb-4 text-green-800">Logo deleted successfully.</h1>
                                </div>
                                <i @click = "confirmmessage1 = false" class="fa-solid fa-xmark absolute right-2 top-2 cursor-pointer "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- events --}}
    <div>
        <div x-data = "{modal:false}">
            <p class="text-gray-800 font-bold text-xl">Events</p>
            <p class="py-2 text-gray-400">Add department events with images and description about the event.</p>
            <div class="flex justify-end items-center">
                <div @click = "modal = true" class=" inline-flex items-center px-4 py-2
                             rounded-md font-bold text-xs text-white bg-blue-600 uppercase tracking-widest border
                             hover:shadow-xl hover:bg-blue-700 cursor-pointer"><i  class="fa-regular fa-plus text-white text-xl mr-3"></i>Add Event
                </div>
            </div>
            {{-- form popup --}}
            <div x-show="modal" x-transition x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-10 bg-slate-500/5 flex items-center justify-center w-full">
                <div class="w-full md:w-[80%] bg-white p-5 rounded-lg shadow-3xl relative" >
                    <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "modal = false"></i>
                    <h1 class="text-center font-semibold text-xl p-2">Add new Event</h1>
                    <div x-data="{showMessage: false}" x-init="window.addEventListener('flashMessage', () => { showMessage = true; setTimeout(() => { showMessage = false; }, 3000); })">
                        @if (session('eventsuccess'))

                            <div x-show="showMessage" x-transition class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">{{session('eventsuccess')}}</span>
                            </div>

                        @endif
                    </div>
                    <form class="" action="" wire:submit="addevent">
                        <div class="grid lg:grid-cols-2 grid-cols-1 pb-5">
                            <div class="flex flex-col p-3">
                                <label for="eventtitle" class="text-sm mt-3 mb-2 font-bold">Event Title :</label>
                                <input value="" type="text" name="name" wire:model="event.title" placeholder="Enter event title" class="border border-gray-300 rounded-md p-2 text-sm">
                                @error('event.title')
                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col p-3">
                                <label for="eventdate" class="text-sm mt-3 mb-2 font-bold">Date of Event held :</label>
                                <input value="" type="date" name="name" wire:model="event.date" placeholder="Enter event title" class="border border-gray-300 rounded-md p-2 text-sm">
                                @error('event.date')
                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col col-span-2 p-3">
                                <label for="description" class="text-sm mt-3 mb-2 font-bold">Description about the event :</label>
                                <textarea class="w-full rounded-md border-gray-300 border-2" name="description" wire:model="event.description" id="" cols="30" rows="6"></textarea>
                                @error('event.description')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="file" class="text-sm mt-3 mb-2 font-bold">Image Upload</label>
                            <input type="file" name="" accept="image/*" placeholder="Choose file" id="imageInput" multiple wire:model="event.images"{{--onchange="previewImage()"--}} class="border border-gray-300 rounded-md p-2 text-sm">
                            <div class="flex" id="" >
                                <div class="flex flex-wrap gap-3 p-2" id="preview">
                                    @if ($event->images)
                                        @foreach ($event->images as $image)
                                            <img src="{{$image->temporaryUrl()}}" class="w-40 h-28 object-cover bg-white" alt="">
                                        @endforeach

                                    @endif
                                </div>

                            </div>
                            @error('event.images.*')
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{$message}}</span>
                                    </div>
                            @enderror
                        </div>
                        <hr>
                        <button class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent
                        rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-gray-700 focus:bg-gray-700">save</button>
                        <div @click = "modal = false" class="inline-flex items-center px-4 py-2
                        rounded-md font-bold text-xs text-black uppercase tracking-widest border
                      hover:shadow-xl cursor-pointer">cancel</div>
                    </form>
                </div>
                </div>

            </div>
            {{-- events form database --}}
            @if ($events)
                @foreach ($events as $event)
                    <div class="border border-slate-200 rounded-md bg-white p-6 mt-2 md:flex justify-between">
                        <div class="inline-flex justify-start">
                            <img src="/storage/{{$event->Galleries->first()->images}}" class="h-36 w-48 object-cover" alt="">
                            <div class="flex flex-col p-3 justify-start">
                                <h1 class="font-bold text-xl">{{$event->title}}</h1>
                                <h2 class="text-slate-500">Date of Event: {{$event->date}}</h2>

                                <p class="line-clamp-3 text-pretty">
                                    {{$event->description}}
                                </p>

                            </div>
                        </div>

                        <div x-data = "{deleteevents:false}" class="flex p-2 gap-2 items-start justify-end">
                            {{-- edit --}}
                            <div class="">
                                <i class="fa-solid fa-pen-to-square bg-green-400/50
                                        hover:scale-110 ease-in-out duration-300
                                        text-green-800 p-2 rounded-full cursor-pointer">
                                </i>
                            </div>
                            <div>

                            </div>
                                {{-- view --}}
                            <div class="">
                                <i class="fa-regular fa-eye bg-blue-400/50
                                        hover:scale-110 ease-in-out duration-300
                                        text-blue-800 p-2 rounded-full cursor-pointer">
                                </i>

                            </div>
                            {{-- delete button --}}
                            <div  class="">
                                <i @click = "deleteevents = true" class="fa-solid fa-trash bg-red-400/50 rounded-full
                                        hover:scale-110 ease-in-out duration-300
                                        text-red-800 p-2  w-8 cursor-pointer text-center">
                                </i>

                            </div>
                            <x-deletecard>
                                hello friends
                            </x-deletecard>
                        </div>

                    </div>
                @endforeach

                {{ $events->links() }}

            @endif



        </div>
    </div>
</div>
