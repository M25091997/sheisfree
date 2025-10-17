@extends('layouts.app')

@section('title', 'Home || Sheishere')

@section('content')
@push('explore')
        @include('partials.explore')
@endpush
    <!-- Main Content -->
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-4 gap-6 px-4 py-6">

        <!-- Left/Main Section -->
        <div class="lg:col-span-3">
            <h1 class="text-2xl font-bold mb-3">Escorts in Dubai, UAE</h1>
            <p class="text-gray-400 mb-6">
                We have <span class="text-yellow-400">6696</span> Dubai escorts on Massage Republic,
                <span class="text-yellow-400">4835</span> profiles verified photos. Popular services include:
                <span class="text-yellow-400">Oral sex, blowjob, Massage, GFE</span> etc.
            </p>

            <!-- Card -->
            @include('components.service-card')
            {{-- @include('components.service-card')
            @include('components.service-card')
            @include('components.service-card')
            @include('components.service-card')
            @include('components.service-card') --}}

        </div>

        <!-- Right Sidebar -->
        <aside class="bg-gray-800 rounded-lg p-2 shadow-md">
            <h2 class="text-lg font-semibold px-2 mb-3 text-white">What's new?</h2>
            <div class="space-y-4">
                @include('components.review-card')

                <div>
                    <a href="#"
                        class="flex flex-col items-center bg-gray-800 border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700  p-1">
                        <img class="object-cover w-full  md:h-auto md:w-20 rounded-lg p-1"
                            src="{{ asset('storage/gallery/services/sdf.png') }}" alt="">
                        <div class="flex flex-col justify-between leading-normal">
                            <p class="text-sm font-medium text-yellow-400">New review for Akira</p>
                            <p class="text-xs text-gray-300">Really relaxed, nice to talk with and amazing...</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#"
                        class="flex flex-col items-center bg-gray-800 border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 p-1">
                        <img class="object-cover w-full  md:h-auto md:w-20 rounded-lg p-1"
                            src="{{ asset('storage/gallery/services/sdf.png') }}" alt="">
                        <div class="flex flex-col justify-between leading-normal">
                            <p class="text-sm font-medium text-yellow-400">New review for Mina</p>
                            <p class="text-xs text-gray-300">Tall, curved, fragrant, emotional...</p>
                        </div>
                    </a>
                </div>
            </div>
        </aside>
    </div>
@endsection
