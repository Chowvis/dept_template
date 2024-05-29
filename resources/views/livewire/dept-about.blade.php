

<div class="bg-gray-200 bg-opacity-25 p-6 lg:p-8">
    <div x-data = "{modal:false}"  class="">
        <div>
            <p class="text-gray-800 font-bold text-xl">About Department</p>
            <p class="py-2 text-gray-400">Update your department description</p>
        </div>
        <textarea disabled class="w-full rounded-md outline-none mt-3 border border-slate-200"
        name="" id=""  rows="5">{{$dbabout}}
        </textarea>


        <button @click ="modal=true" class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent
            rounded-md font-semibold text-xs text-white uppercase tracking-widest
          hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none
           focus:ring-2 focus:ring-cyan-700 focus:ring-offset-2 transition ease-in-out duration-150">edit</button>
        <div x-show="modal" x-transition x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-10 bg-slate-500/5 flex items-center justify-center w-full">
            <div class="w-full md:w-[80%] bg-white p-5 rounded-lg shadow-3xl relative" >
                <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "modal = false"></i>
                <h1 class="text-center font-semibold text-xl p-2">Edit About Department</h1>
                <div x-data="{showMessage: false}" x-init="window.addEventListener('flashMessage', () => { showMessage = true; setTimeout(() => { showMessage = false; }, 3000); })">
                    @if (session('success'))

                        <div x-show="showMessage" x-transition class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">{{session('success')}}</span>
                        </div>

                    @endif
                </div>
                <form class="" action="" wire:submit="editabout">

                    <textarea class="w-full rounded-md border-gray-300 border-2" name="about" wire:model="about" id="" cols="30" rows="10"></textarea>
                    @error('about')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">{{$message}}</span>
                        </div>
                    @enderror
                    <br>
                    <button @click = "modal = true"  class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent
                    rounded-md font-semibold text-xs text-white uppercase tracking-widest
                  hover:bg-gray-700 focus:bg-gray-700">save</button>
                    <div @click = "modal = false" class="inline-flex items-center px-4 py-2
                    rounded-md font-bold text-xs text-black uppercase tracking-widest border
                  hover:shadow-xl cursor-pointer">cancel</div>
                </form>
            </div>
            </div>

        </div>
        <hr class="my-4">
        <div>
        {{-- address section --}}
            <div class=" bg-gray-50 h-full">
                <div class="flex justify-between py-3 h-24 items-center">
                    <div>
                        <p class="text-gray-800 font-bold text-xl">Address</p>
                        <p class="py-2 text-gray-400">Fill your department address details.
                            <br> Set your department latitude and longitude for showing exact location to your portal</p>
                    </div>

                </div>

                <div class="font-nunito bg-white border border-gray-300 rounded-md p-3">

                    <div class="grid lg:grid-cols-2 grid-cols-1 pb-5">
                        <div class="flex flex-col p-3">
                            <label for="deptname" class="text-sm mt-5 mb-2 font-bold">Department Name</label>
                            <input value="{{$dbaddress==null?"no address available":($dbaddress->deptname==null?"no data":$dbaddress->deptname)}}" type="text" name="deptname" disabled class="border border-gray-300 rounded-md p-2 text-sm">

                        </div>

                        <div class="flex flex-col p-3">
                            <label for="street" class="text-sm mt-5 mb-2 font-bold">Street</label>
                            <input value="{{$dbaddress==null?"no address available":($dbaddress->street==null?"no data":$dbaddress->street)}}" type="text" name="street" disabled class="border border-gray-300 rounded-md p-2 text-sm">

                        </div>

                        <div class="flex flex-col p-3">
                            <label for="city" class="text-sm mt-3 mb-2 font-bold">City</label>
                            <input value="{{$dbaddress==null?"no address available":($dbaddress->city==null?"no data":$dbaddress->city)}}" type="text" name="city" disabled class="border border-gray-300 rounded-md p-2 text-sm">

                        </div>

                        <div class="flex flex-col p-3">
                            <label for="state" class="text-sm mt-3 mb-2 font-bold">State</label>
                            <input value="{{$dbaddress==null?"no address available":($dbaddress->state==null?"no data":$dbaddress->state)}}" name="state" id="" disabled class="border border-gray-300 rounded-md p-2 text-sm">

                        </div>

                        <div class="flex flex-col p-3">
                            <label for="district" class="text-sm mt-3 mb-2 font-bold">District</label>
                            <input value="{{$dbaddress==null?"no address available":($dbaddress->district==null?"no data":$dbaddress->district)}}" name="district" id="" disabled class="border border-gray-300 rounded-md p-2 text-sm">

                        </div>

                        <div class="flex flex-col p-3">
                            <label for="pincode" class="text-sm mt-3 mb-2 font-bold">Pin Code</label>
                            <input value="{{$dbaddress==null?"no address available":($dbaddress->pincode==null?"no data":$dbaddress->pincode)}}" type="text" name="pincode" disabled class="border border-gray-300 rounded-md p-2 text-sm">

                        </div>


                    </div>

                    <hr>



                    <div class="p-3 pb-5 ">
                        <label  class="text-sm mt-3 mb-2 font-bold">Latitude</label>
                        <input  disabled class="border border-gray-300 rounded-md p-2 text-sm" value="{{$dbaddress==null?"no":($dbaddress->lat==null?"no data":$dbaddress->lat)}}">

                        <label class="text-sm mt-3 mb-2 font-bold">Longitude</label>
                        <input  disabled class="border border-gray-300 rounded-md p-2 text-sm " value="{{$dbaddress==null?"no":($dbaddress->lng==null?"no data":$dbaddress->lng)}}">

                    </div>
                    <div wire:ignore class="h-80 w-full z-50" id="viewmap">
                        leaflet
                    </div>
                    <div class="p-3 pb-5">
                        <a href="{{route('showeditabout')}}">
                            <button class="inline-flex items-center px-4 py-2 bg-cyan-700 border border-transparent
                            rounded-md font-semibold text-xs text-white uppercase tracking-widest
                            hover:bg-gray-700 focus:bg-gray-700">
                            Edit
                        </button>
                        </a>

                    </div>
                </div>






                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

                <script>
                    var coordinates;

                    var map = L.map('viewmap').setView([
                        {{$dbaddress==null?28.2180:($dbaddress->lat==null?28.2180:$dbaddress->lat)}},
                        {{$dbaddress==null?94.7278:($dbaddress->lng==null?94.7278:$dbaddress->lng)}}
                        ], 7);

                    // layers
                    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    });

                    var myMarker = L.marker([
                        {{$dbaddress==null?28.2180:($dbaddress->lat==null?28.2180:$dbaddress->lat)}},
                        {{$dbaddress==null?94.7278:($dbaddress->lng==null?94.7278:$dbaddress->lng)}}
                    ])
                    // myMarker.addTo(map) will add the marker
                    myMarker.addTo(map)


                    myMarker.addTo(map);
                    osm.addTo(map);

                    function removemap(){
                        document.getElementById('viewmap').classList.add('hidden');
                    }
                    function applymap(){
                        document.getElementById('viewmap').classList.remove('hidden');
                    }

                </script>



            </div>




        </div>
        <hr class="my-4">
        {{-- head of department section --}}
        <div>
            <div>
                <p class="text-gray-800 font-bold text-xl">Head of Department</p>
                <p class="py-2 text-gray-400">Update your head of Ministry and head of Department</p>
                <div x-data="{showMessage: false}" x-init="window.addEventListener('flashMessage', () => { showMessage = true; setTimeout(() => { showMessage = false; }, 3000); })">
                    @if (session('success'))

                        <div x-show="showMessage" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">{{session('success')}}</span>
                        </div>

                    @endif
                </div>

                <div class="w-full rounded-lg">
                    <div class="grid lg:grid-cols-2 grid-cols-1 pb-5 gap-4">
                        {{-- left card --}}
                        <div x-data = "{cardleft:false,removecardleft:false,confirmmessage1:false}" class="flex flex-col border border-slate-200 rounded-md bg-white p-6 gap-4">
                            <div class="inline-flex ">
                                <h1 class="font-bold text-xs text-slate-700 bg-slate-200 py-2 px-4 rounded-full">
                                    Head of Ministry card
                                </h1>
                            </div>
                            <div class="flex justify-left gap-3 h-full w-full object-cover relative">
                                @if ($card1===null)
                                    <img src="logos/user.png" class="rounded-lg h-36 w-36"  alt="">
                                @elseif ($card1->profile_image)
                                    <img src="/storage/{{$card1->profile_image}}" class="rounded-lg h-36 w-36 object-cover "  alt="">
                                @else
                                    <img src="logos/user.png" class="rounded-lg h-36 w-36"  alt="">
                                @endif

                                <div class="flex flex-col justify-start">

                                    <h2 class="font-bold text-2xl">{{$card1===null?'Jhon Carlo':$card1->name}}</h2>
                                    <p class="text-lg font-semibold text-gray-500">{{$card1===null?'Assistant proffessor':$card1->postname}}</p>
                                    <div class="flex flex-col mt-2 gap-3">
                                        <p class="text-xs"><i class="fa-solid fa-phone rounded-full text-blue-800 bg-blue-400/50 p-2 mr-1"></i>{{$card1===null?'1122334455':$card1->phone}}</p>
                                        <p class="text-xs"><i class="fa-solid fa-envelope rounded-full text-white bg-red-500 p-2 mr-1"></i>{{$card1===null?'admin@test.test':$card1->email}}</p>


                                    </div>
                                </div>

                                <button wire.prevent class="absolute right-0 top-0 rounded-full">
                                    <i @click = 'cardleft = true' class="fa-solid fa-pen-to-square bg-green-400/50
                                             hover:scale-110 ease-in-out duration-300
                                             text-green-800 p-2 rounded-full cursor-pointer">
                                    </i>
                                </button>
                                @if ($card1)
                                <button wire.prevent class="absolute right-12 top-0 bg-red-400/50 w-8 rounded-full">
                                    <i @click = 'removecardleft = true' class="fa-solid fa-trash
                                             hover:scale-110 ease-in-out duration-300
                                             text-red-800 p-2 rounded-full cursor-pointer">
                                    </i>

                                </button>
                                @endif
                            </div>
                            <div x-data="{ showTwitter: false,showFacebook: false,showInsta : false }" class="">
                                <!-- Icon -->
                                <div class="flex justify-end gap-3">
                                    <a href="#" class="relative">
                                        <i @mouseenter="showTwitter = true"
                                        @mouseleave="showTwitter = false" class="fa-brands fa-x-twitter rounded-full text-white bg-black p-2 mr-1">
                                        </i>
                                        <div
                                        x-show="showTwitter"
                                        x-transition
                                        class="absolute bg-gray-800 text-white text-sm rounded-md px-4 py-2"
                                        >
                                        {{$card1===null?'admin@test.test':$card1->twitter}}
                                        </div>
                                    </a>

                                    <a href="#">
                                        <i @mouseenter="showFacebook = true"
                                        @mouseleave="showFacebook = false" class="fa-brands fa-facebook rounded-full text-white bg-black p-2 mr-1">
                                        </i>
                                    </a>

                                    <a href="#">
                                        <i @mouseenter="showInsta = true"
                                        @mouseleave="showInsta = false" class="fa-brands fa-instagram rounded-full text-white bg-black p-2 mr-1">
                                        </i>
                                    </a>
                                </div>




                                <!-- Text to show on hover -->

                            </div>


                            <div x-show="cardleft" x-transition x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                                <div class="w-full md:w-[80%] bg-white p-5 rounded-lg shadow-3xl relative">
                                    <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "cardleft = false"></i>
                                    <h1 class="text-center font-semibold text-xl p-2 mb-4">Edit card 1</h1>
                                    <div x-data="{showMessage: false}" x-init="window.addEventListener('flashMessage', () => { showMessage = true; setTimeout(() => { showMessage = false; }, 3000); })">
                                        @if (session('success_card'))

                                            <div x-show="showMessage" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                                <span class="font-medium">{{session('success_card')}}</span>
                                            </div>

                                        @endif
                                    </div>
                                    {{-- form 1 --}}
                                    <form class=" bg-white border border-gray-300 rounded-md p-3" wire:submit="editleftcard">

                                        {{-- image file --}}
                                        <div class="relative flex justify-center">
                                            <div class="flex p-3 justify-center absolute -top-10">
                                                <div class=" flex h-32 w-32 justify-center rounded-full items-center bg-slate-100 relative shadow-lg ">
                                                    <div class="h-28 w-28 flex justify-center overflow-hidden rounded-full items-center relative">
                                                        @if ($card1===null)
                                                            <img src="logos/user.png" class="h-28 w-28 object-cover"  alt="">
                                                        @elseif ($card1->profile_image)
                                                            <img src="/storage/{{$card1->profile_image}}" class="h-28 w-28 object-cover" alt="">
                                                        @else
                                                            <img src="logos/user.png" class="h-28 w-28 object-cover"  alt="">
                                                        @endif

                                                    </div>

                                                    <input type="file" name="profile_image" wire:model="minister.profile_image" id="profile_image" accept="image/*" class=" hidden">
                                                    <label for="profile_image" class="cursor-pointer absolute  -bottom-4 flex items-center justify-center w-8 h-8 bg-white rounded-full shadow-lg hover:bg-gray-300">
                                                        <i class="fa-solid fa-pen text-xs text-gray-500"></i>
                                                    </label>
                                                    @if ($minister->profile_image)
                                                    <div class="absolute z-10">
                                                        <img src="{{$minister->profile_image->temporaryUrl()}}" class="h-28 w-28 object-cover rounded-full" alt="">
                                                    </div>

                                                @endif

                                                </div>
                                                @error('minister.profile_image')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="grid lg:grid-cols-2 grid-cols-1 pb-5 mt-32 border-t border-gray-300">
                                            <div class="flex flex-col p-3">
                                                <label for="fname" class="text-sm mt-3 mb-2 font-bold">Full Name</label>
                                                <input value="" type="text" name="name" wire:model="minister.name" placeholder="Enter full name" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.name')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="postname" class="text-sm mt-3 mb-2 font-bold">Post Name</label>
                                                <input value="" type="text" name="postname" wire:model="minister.postname" placeholder="Enter Designation" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.postname')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="email" class="text-sm mt-3 mb-2 font-bold">Email</label>
                                                <input value="" type="email" wire:model="minister.email" placeholder="example@gmail.com" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.email')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="phone" class="text-sm mt-3 mb-2 font-bold">Phone No.</label>
                                                <input value="" type="tel" name="phone" wire:model="minister.phone" maxlength="10" minlength="10"  placeholder="Enter Phone number" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.phone')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="twitter" class="text-sm mt-3 mb-2 font-bold">Twitter link</label>
                                                <input value="" type="url" name="twitter" wire:model="minister.twitter"  placeholder="Enter twitter link" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.twitter')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="facebook" class="text-sm mt-3 mb-2 font-bold">Facebook link</label>
                                                <input value="" type="url" name="facebook" wire:model="minister.facebook"  placeholder="Enter facebook link" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.facebook')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="instagram" class="text-sm mt-3 mb-2 font-bold">Instagram link</label>
                                                <input value="" type="url" name="instagram" wire:model="minister.instagram"  placeholder="Enter instagram link" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister.instagram')
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
                            <div x-show="removecardleft" x-transition:enter.scale.20.duration.300ms x-transition:leave.scale.20.duration.100ms x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/0 flex items-center justify-center w-full">
                                <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative">
                                    <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "removecardleft = false"></i>
                                    <h1 class="text-center font-semibold text-xl p-2 mb-4">Are you sure to delete?</h1>
                                    <h1 class="text-center text-slate-500 font-semibold text-sm p-2 mb-4">Note: All the data reguarding this card will be deleted!</h1>
                                    <form wire:submit = "deletecard1" class="flex justify-center gap-3">
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
                            </div>
                            <div x-show="confirmmessage1"
                                x-transition
                                x-cloak
                                class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                                <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative ">
                                    <div class="flex flex-col items-center justify-center p-10 ">
                                        <i class="fa-regular fa-circle-check text-3xl text-green-800"></i>
                                        <h1 class="text-center font-semibold text-xl p-2 mb-4 text-green-800">Card deleted successfully.</h1>
                                    </div>
                                    <i @click = "confirmmessage1 = false" class="fa-solid fa-xmark absolute right-2 top-2 cursor-pointer "></i>
                                </div>
                            </div>
                        </div>
                        {{-- right card --}}
                        <div x-data = "{cardright:false,removecardright:false,confirmmessage2:false,}" class="flex flex-col border border-slate-200 rounded-md bg-white p-6 gap-4">
                            <div class="inline-flex ">
                                <h1 class="font-bold text-xs text-slate-700 bg-slate-200 py-2 px-4 rounded-full">
                                    Head of department card
                                </h1>
                            </div>
                            <div class="flex justify-left gap-3 h-full w-full object-cover relative">
                                @if ($card2===null)
                                    <img src="logos/user.png" class="rounded-lg h-36 w-36"  alt="">
                                @elseif ($card2->profile_image)
                                    <img src="/storage/{{$card2->profile_image}}" class="rounded-lg h-36 w-36 object-cover "  alt="">
                                @else
                                    <img src="logos/user.png" class="rounded-lg h-36 w-36"  alt="">
                                @endif

                                <div class="flex flex-col justify-start">

                                    <h2 class="font-bold text-2xl">{{$card2===null?'Jhon Carlo':$card2->name}}</h2>
                                    <p class="text-lg font-semibold text-gray-500">{{$card2===null?'Assistant proffessor':$card2->postname}}</p>
                                    <div class="flex flex-col mt-2 gap-3">
                                        <p class="text-xs"><i class="fa-solid fa-phone rounded-full text-blue-800 bg-blue-400/50 p-2 mr-1"></i>{{$card2===null?'1122334455':$card2->phone}}</p>
                                        <p class="text-xs"><i class="fa-solid fa-envelope rounded-full text-white bg-red-500 p-2 mr-1"></i>{{$card2===null?'admin@test.test':$card2->email}}</p>


                                    </div>
                                </div>

                                <button wire.prevent class="absolute right-0 top-0 rounded-full">
                                    <i @click = 'cardright = true' class="fa-solid fa-pen-to-square bg-green-400/50
                                             hover:scale-110 ease-in-out duration-300
                                             text-green-800 p-2 rounded-full cursor-pointer">
                                    </i>
                                </button>
                                @if ($card2)
                                <button wire.prevent class="absolute right-12 top-0 bg-red-400/50 w-8 rounded-full">
                                    <i @click = 'removecardright = true' class="fa-solid fa-trash
                                             hover:scale-110 ease-in-out duration-300
                                             text-red-800 p-2 rounded-full cursor-pointer">
                                    </i>

                                </button>
                                @endif
                            </div>
                            <div x-data="{ showTwitter2: false,showFacebook2: false,showInsta2 : false }" class="">
                                <!-- Icon -->
                                <div class="flex justify-end gap-3">
                                    <a href="#" class="relative">
                                        <i @mouseenter="showTwitter2 = true"
                                        @mouseleave="showTwitter2 = false" class="fa-brands fa-x-twitter rounded-full text-white bg-black p-2 mr-1">
                                        </i>
                                        <div
                                        x-show="showTwitter2"
                                        x-transition
                                        class="absolute bg-gray-800 text-white text-sm rounded-md px-4 py-2"
                                        >
                                        {{$card2===null?'admin@test.test':$card2->twitter}}
                                        </div>
                                    </a>

                                    <a href="#">
                                        <i @mouseenter="showFacebook2 = true"
                                        @mouseleave="showFacebook2 = false" class="fa-brands fa-facebook rounded-full text-white bg-black p-2 mr-1">
                                        </i>
                                    </a>

                                    <a href="#">
                                        <i @mouseenter="showInsta2 = true"
                                        @mouseleave="showInsta2 = false" class="fa-brands fa-instagram rounded-full text-white bg-black p-2 mr-1">
                                        </i>
                                    </a>
                                </div>




                                <!-- Text to show on hover -->

                            </div>


                            <div x-show="cardright" x-transition x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                                <div class="w-full md:w-[80%] bg-white p-5 rounded-lg shadow-3xl relative">
                                    <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "cardright = false"></i>
                                    <h1 class="text-center font-semibold text-xl p-2 mb-4">Edit card 2</h1>
                                    <div x-data="{showMessage: false}" x-init="window.addEventListener('flashMessage', () => { showMessage = true; setTimeout(() => { showMessage = false; }, 3000); })">
                                        @if (session('success_card'))

                                            <div x-show="showMessage" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                                <span class="font-medium">{{session('success_card')}}</span>
                                            </div>

                                        @endif
                                    </div>
                                    {{-- form 1 --}}
                                    <form class=" bg-white border border-gray-300 rounded-md p-3" wire:submit="editrightcard">

                                        {{-- image file --}}
                                        <div class="relative flex justify-center">
                                            <div class="flex p-3 justify-center absolute -top-10">
                                                <div class=" flex h-32 w-32 justify-center rounded-full items-center bg-slate-100 relative shadow-lg ">
                                                    <div class="h-28 w-28 flex justify-center overflow-hidden rounded-full items-center relative">
                                                        @if ($card2===null)
                                                            <img src="logos/user.png" class="h-28 w-28 object-cover"  alt="">
                                                        @elseif ($card2->profile_image)
                                                            <img src="/storage/{{$card2->profile_image}}" class="h-28 w-28 object-cover" alt="">
                                                        @else
                                                            <img src="logos/user.png" class="h-28 w-28 object-cover"  alt="">
                                                        @endif

                                                    </div>

                                                    <input type="file" name="profile_image2" wire:model="minister2.profile_image" id="profile_image2" accept="image/*" class=" hidden">
                                                    <label for="profile_image2" class="cursor-pointer absolute  -bottom-4 flex items-center justify-center w-8 h-8 bg-white rounded-full shadow-lg hover:bg-gray-300">
                                                        <i class="fa-solid fa-pen text-xs text-gray-500"></i>
                                                    </label>
                                                    @if ($minister2->profile_image)
                                                    <div class="absolute z-10">
                                                        <img src="{{$minister2->profile_image->temporaryUrl()}}" class="h-28 w-28 object-cover rounded-full" alt="">
                                                    </div>

                                                @endif

                                                </div>
                                                @error('minister2.profile_image')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="grid lg:grid-cols-2 grid-cols-1 pb-5 mt-32 border-t border-gray-300">
                                            <div class="flex flex-col p-3">
                                                <label for="name2" class="text-sm mt-3 mb-2 font-bold">Full Name</label>
                                                <input value="" type="text" name="name2" wire:model="minister2.name" placeholder="Enter full name" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.name')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="postname2" class="text-sm mt-3 mb-2 font-bold">Post Name</label>
                                                <input value="" type="text" name="postname2" wire:model="minister2.postname" placeholder="Enter Designation" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.postname')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="email" class="text-sm mt-3 mb-2 font-bold">Email</label>
                                                <input value="" type="email" wire:model="minister2.email" placeholder="example@gmail.com" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.email')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="phone" class="text-sm mt-3 mb-2 font-bold">Phone No.</label>
                                                <input value="" type="tel" name="phone" wire:model="minister2.phone" maxlength="10" minlength="10"  placeholder="Enter Phone number" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.phone')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="twitter" class="text-sm mt-3 mb-2 font-bold">Twitter link</label>
                                                <input value="" type="url" name="twitter" wire:model="minister2.twitter"  placeholder="Enter twitter link" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.twitter')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="facebook" class="text-sm mt-3 mb-2 font-bold">Facebook link</label>
                                                <input value="" type="url" name="facebook" wire:model="minister2.facebook"  placeholder="Enter facebook link" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.facebook')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col p-3">
                                                <label for="instagram" class="text-sm mt-3 mb-2 font-bold">Instagram link</label>
                                                <input value="" type="url" name="instagram" wire:model="minister2.instagram"  placeholder="Enter instagram link" class="border border-gray-300 rounded-md p-2 text-sm">
                                                @error('minister2.instagram')
                                                    <span class="text-red-500 text-sm">{{$message}}</span>
                                                @enderror
                                            </div>


                                        </div>
                                        <hr>
                                        <div class="p-3 pb-5">

                                            <button class=" inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent
                                            rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                            hover:bg-blue-800 focus:bg-gray-700">save</button>
                                            <div @click = "cardright = false" class=" inline-flex items-center px-4 py-2
                                                rounded-md font-bold text-xs text-black uppercase tracking-widest border
                                            hover:shadow-xl hover:text-red-500 cursor-pointer">cancel</div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div x-show="removecardright" x-transition x-cloak class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                                <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative">
                                    <i class="fa-solid fa-circle-xmark absolute right-2 top-1 text-red-500 text-xl hover:text-red-800 hover:scale-110 duration-200 ease-in-out" @click = "removecardright = false"></i>
                                    <h1 class="text-center font-semibold text-xl p-2 mb-4">Are you sure to delete?</h1>
                                    <h1 class="text-center text-slate-500 font-semibold text-sm p-2 mb-4">Note: All the data reguarding this card will be deleted!</h1>
                                    <form wire:submit = "deletecard2" class="flex justify-center gap-3">
                                        <button @click = "confirmmessage2 = true, removecardright = false" class=" inline-flex items-center px-4 py-2 bg-red-600 border border-transparent
                                        rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                         hover:bg-red-800 ">Delete
                                        </button>
                                        <div @click = "removecardright = false" class=" inline-flex items-center px-4 py-2
                                            rounded-md font-bold text-xs text-black uppercase tracking-widest border
                                        hover:shadow-xl hover:text-red-500 cursor-pointer">cancel
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div x-show="confirmmessage2"
                                x-transition
                                x-cloak
                                class="p-16 bg-gray-100 fixed top-0 left-0 bottom-0 z-50 bg-slate-500/5 flex items-center justify-center w-full">
                                <div class="w-full md:w-[50%] bg-white p-5 rounded-lg shadow-3xl relative ">
                                    <div class="flex flex-col items-center justify-center p-10 ">
                                        <i class="fa-regular fa-circle-check text-3xl text-green-800"></i>
                                        <h1 class="text-center font-semibold text-xl p-2 mb-4 text-green-800">Card deleted successfully.</h1>
                                    </div>
                                    <i @click = "confirmmessage2 = false" class="fa-solid fa-xmark absolute right-2 top-2 cursor-pointer "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



