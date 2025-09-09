<div class="bg-gray-800 p-4 rounded-lg shadow-md flex flex-col md:flex-row gap-4 my-6">
    <!-- Left: gallery (main + thumbs) -->
    <div class="md:w-1/3 flex flex-col items-center">
        <!-- MAIN image -->
        <a href="{{ asset('storage/gallery/services/sdf-big.png') }}" class="MagicZoom" id="serviceGallery1"
            data-options="zoomMode: off; expand: fullscreen; cssClass: mz-show-arrows;">
            <img src="{{ asset('storage/gallery/services/sdf.png') }}" class="rounded-lg" alt="Main" />
        </a>

        <!-- Thumbnails -->
        <div class="flex gap-2 mt-4">
            <a data-zoom-id="serviceGallery1" href="{{ asset('storage/gallery/services/sdf-big.png') }}"
                data-image="{{ asset('storage/gallery/services/sdf.png') }}">
                <img src="{{ asset('storage/gallery/services/sdf.png') }}" class="w-16 h-16 rounded-lg"
                    alt="1" />
            </a>

            <a data-zoom-id="serviceGallery1" href="{{ asset('storage/gallery/services/sdf2-big.png') }}"
                data-image="{{ asset('storage/gallery/services/sdf2.png') }}">
                <img src="{{ asset('storage/gallery/services/sdf.png') }}" class="w-16 h-16 rounded-lg"
                    alt="2" />
            </a>

            <a data-zoom-id="serviceGallery1" href="{{ asset('storage/gallery/services/sdf3-big.png') }}"
                data-image="{{ asset('storage/gallery/services/sdf3.png') }}">
                <img src="{{ asset('storage/gallery/services/sdf3-thumb.png') }}" class="w-16 h-16 rounded-lg"
                    alt="3" />
            </a>
        </div>
    </div>

    <!-- Right: content -->
    <div class="flex-1">
        <h2 class="text-xl font-semibold text-yellow-400 mb-2">+20 VIP young fresh girls</h2>
        <p class="text-gray-300 text-sm mb-3">
            Beautiful young girls from Russia, Ukraine and Belarus.
        </p>
        <button class="bg-yellow-500 text-black px-4 py-2 rounded">See more & contact</button>
    </div>
</div>
