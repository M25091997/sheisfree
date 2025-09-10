<div class="bg-gray-800 p-2 rounded-lg shadow-md flex flex-col md:flex-row gap-4 my-6 h-50">
    <!-- Left: gallery (main + thumbs) -->
    <div class="md:w-2/6 flex flex-row items-center">
        <!-- MAIN image -->
        <a href="{{ asset('storage/gallery/services/sdf-big.png') }}" class="MagicZoom block w-40 h-40"
            {{-- fixed size box --}} id="serviceGallery1"
            data-options="zoomMode: off; expand: fullscreen; cssClass: mz-show-arrows;">
            <img src="{{ asset('storage/gallery/services/sdf.png') }}" class="w-full h-full object-cover rounded-lg"
                alt="Main" />
        </a>


        <!-- Thumbnails -->
        <div class="flex flex-col gap-1 mx-2">
            <a data-zoom-id="serviceGallery1" href="{{ asset('storage/gallery/services/sdf-big.png') }}"
                data-image="{{ asset('storage/gallery/services/sdf.png') }}">
                <img src="{{ asset('storage/gallery/services/sdf.png') }}" class="w-14 h-14 rounded-md"
                    alt="1" />
            </a>

            <a data-zoom-id="serviceGallery1" href="{{ asset('storage/gallery/services/red.jpg') }}"
                data-image="{{ asset('storage/gallery/services/red.jpg') }}">
                <img src="{{ asset('storage/gallery/services/red.jpg') }}" class="w-14 h-14 rounded-md"
                    alt="2" />
            </a>

            <a data-zoom-id="serviceGallery1" href="{{ asset('storage/gallery/services/gg.png') }}"
                data-image="{{ asset('storage/gallery/services/gg.png') }}">
                <img src="{{ asset('storage/gallery/services/gg.png') }}" class="w-14 h-14 rounded-md"
                    alt="3" />
            </a>
        </div>
    </div>

    <!-- Right: content -->
    <div class="flex-1">
        <h2 class="text-xl font-semibold text-yellow-400 mb-2">+20 VIP Order product</h2>
        <p class="text-gray-300 text-sm mb-3">
            Beautiful young product from Russia, Ukraine and Belarus.
        </p>
        <button class="bg-yellow-500 text-black px-4 py-2 rounded">See more & contact</button>
    </div>
</div>
