<div class=" max-w-[1280px] w-full flex flex-col md:flex-row p-3 gap-4">
    <div class="w-full md:w-1/2 flex flex-col">
        <div id="photo_gallery" class="text-lg flex flex-col">
            <p class="font-semibold text-white">Photo Gallery</p>

        </div>
        <div id="content_for_gallery" class="flex gap-2 mb-4">
            <div class="w-3/4 h-full bg-cyan-600">
                main image
            </div>
            <div class="h-auto w-1/4 flex flex-col gap-3">
                <div class="h-32 w-full bg-cyan-200"> img 1</div>
                <div class="h-32 w-full bg-cyan-200">img 2</div>
                <div class="h-32 w-full bg-cyan-200">img 3</div>
            </div>
        </div>
        <div class="hover:scale-110 ease-in-out duration-300 w-fit">
            <a href="" class="bg-cyan-200 font-bold text-cyan-700  p-2 rounded-md text-sm">{{--read more link--}}
                View all
            </a>
        </div>
    </div>
    {{-- map --}}
    <div class="w-full md:w-1/2 flex flex-col">
        <div id="" class="text-lg font-semibold text-center text-white">Office Location Guide</div>
        <div id="content_for_calender" class="w-full h-full ">
            <div id="map" class="h-80 w-full">

            </div>
            <div class="p-3  text-md font-semibold mt-2 bg-white rounded-lg">
                <p class="text-cyan-700">Address:</p>
                <p class="text-sm">{{$dbaddress->deptname}}, {{$dbaddress->street}}, {{$dbaddress->city}}, {{$dbaddress->district}}, {{$dbaddress->pincode}}, {{$dbaddress->state}}</p>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        var coordinates;
        var map = L.map('map').setView([
            {{$dbaddress==null?28.2180:($dbaddress->lat==null?28.2180:$dbaddress->lat)}},
            {{$dbaddress==null?94.7278:($dbaddress->lng==null?94.7278:$dbaddress->lng)}}
        ],{{$dbaddress==null?8:($dbaddress->lat==null||$dbaddress->lng==null?8:15)}});

        // layers
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright"></a> '
        });
        var popupContent = '<p>Hello world!<br />This is a nice popup.</p>';

        var myMarker = L.marker([
            {{$dbaddress==null?28.2180:($dbaddress->lat==null?28.2180:$dbaddress->lat)}},
            {{$dbaddress==null?94.7278:($dbaddress->lng==null?94.7278:$dbaddress->lng)}}
        ]);
        // myMarker.addTo(map) will add the marker
        myMarker.bindPopup(popupContent);
        myMarker.addTo(map);


        osm.addTo(map);
    </script>
</div>
